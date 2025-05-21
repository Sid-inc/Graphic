using System.Net;
using Graphic.Api.Models;
using Graphic.Api.Models.Dto;
using Graphic.Core.Abstractions;
using Graphic.Core.Common;
using Graphic.Core.Models;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace Graphic.Api.Controllers;

public class UsersController : GraphicRootController
{
    readonly IUsersService _usersService;
    readonly ILogger<UsersController> _logger;

    public UsersController(IUsersService usersService, ILogger<UsersController> logger)
    {
        _usersService = usersService;
        _logger = logger;
    }
    
    [HttpPost]
    public async Task<ActionResult<ServerResponse>> Register([FromBody] RegisterUserDto? registerRequest)
    {
        if (registerRequest is null || registerRequest.Email is null || registerRequest.Password is null)
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Ошибка регистрации" }
            });
        
        var existUser = await _usersService.GetUserByEmail(registerRequest.Email);
        
        if (existUser is not null)
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Ошибка регистрации", "Пользователь с таким Email уже существует" }
            });

        var newUser = new User
        {
            Email = registerRequest.Email,
            UserName = registerRequest.UserName ?? registerRequest.Email,
        };
        
        var result = await _usersService.CreateUser(newUser, registerRequest.Password);

        if (result is null)
        {
            _logger.LogError("Ошибка регистрации");
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Ошибка регистрации", "Не удалось создать пользователя" }
            });
        }

        return Ok(new ServerResponse { StatusCode = HttpStatusCode.Created });
    }

    [HttpGet]
    [Authorize(Roles = SharedData.Roles.Admin)]
    public async Task<ActionResult<ServerResponse>> GetUsers()
    {
        var users = await _usersService.GetAllUsers();
        
        return Ok(new ServerResponse { Result = users });
    }
    
    [HttpGet("{id}")]
    [Authorize(Roles = SharedData.Roles.Admin)]
    public async Task<ActionResult<ServerResponse>> GetByIs(string id)
    {
        var user = await _usersService.GetUserById(id);
        
        if (user is null)
        {
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Пользователь не найден" }
            });
        }
        return Ok(new ServerResponse { Result = user });
    }
    
    [HttpGet("{email}")]
    [Authorize(Roles = SharedData.Roles.Admin)]
    public async Task<ActionResult<ServerResponse>> GetByEmail(string email)
    {
        var user = await _usersService.GetUserByEmail(email);
        
        if (user is null)
        {
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Пользователь не найден" }
            });
        }
        return Ok(new ServerResponse { Result = user });
    }
    
    [HttpPut("{id}")]
    [Authorize(Roles = SharedData.Roles.Admin)]
    public async Task<ActionResult<ServerResponse>> Update(string id, [FromBody] UserUpdateDto userUpdate)
    {
        var updatedId = await _usersService.UpdateUser(id, userUpdate.UserName, userUpdate.Icon, userUpdate.IsBlocked);
        return Ok(new ServerResponse { Result = updatedId });
    }
}