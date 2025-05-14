using System.Net;
using System.Text.Json;
using Graphic.Api.Common;
using Graphic.Api.Data;
using Graphic.Api.Models;
using Graphic.Api.Models.Dto;
using Graphic.Api.Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace Graphic.Api.Controllers;

public class AuthController : GraphicRootController
{
    readonly UserManager<User> _userManager;
    readonly RoleManager<IdentityRole> _roleManager;
    readonly ILogger _logger;
    readonly JwtTokenGenerator _jwtTokenGenerator;

    public AuthController(AppDbContext appDbContext, UserManager<User> userManager, RoleManager<IdentityRole> roleManager, ILogger logger, JwtTokenGenerator jwtTokenGenerator) 
        : base(appDbContext)
    {
        _userManager = userManager;
        _roleManager = roleManager;
        _logger = logger;
        _jwtTokenGenerator = jwtTokenGenerator;
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
        
        var userFromDb = await DbContext.GraphicUsers.FirstOrDefaultAsync(u => u.Email != null && u.Email.ToLower() == registerRequest.Email.ToLower());
        
        if (userFromDb is not null)
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
        
        var result = await _userManager.CreateAsync(newUser, registerRequest.Password);

        if (!result.Succeeded)
        {
            _logger.LogError(JsonSerializer.Serialize(result.Errors), registerRequest);
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Ошибка регистрации", "Не удалось создать пользователя" }
            });
        }
        
        await _userManager.AddToRoleAsync(newUser, SharedData.Roles.Owner);

        return Ok(new ServerResponse { StatusCode = HttpStatusCode.Created });
    }

    [HttpPost]
    public async Task<ActionResult<ServerResponse>> Login([FromBody] LoginRequestDto? loginRequest)
    {
        if (loginRequest is null || loginRequest.Email is null || loginRequest.Password is null) 
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Пустой логин или пароль" }
            });
        
        var userFromDb = await DbContext.GraphicUsers.FirstOrDefaultAsync(u => u.Email != null && u.Email.ToLower() == loginRequest.Email.ToLower());
        
        if (userFromDb is null || !await _userManager.CheckPasswordAsync(userFromDb, loginRequest.Password))
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Неверный логин или пароль" }
            });
        
        var token = _jwtTokenGenerator.GenerateJwtToken(userFromDb);
        
        if (string.IsNullOrEmpty(token))
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Ошибка аутентификации" }
            });
        
        return Ok(new ServerResponse { StatusCode = HttpStatusCode.OK, Result = new LoginResponseDto { Token = token }});
    }

    [HttpPost]
    [Authorize(Roles = SharedData.Roles.Admin)]
    public async Task<ActionResult<ServerResponse>> GetUsers()
    {
        return BadRequest(new ServerResponse
        {
            IsSuccess = false,
            StatusCode = HttpStatusCode.BadRequest,
            ErrorMessages = { "Ошибка аутентификации" }
        });
    }
}