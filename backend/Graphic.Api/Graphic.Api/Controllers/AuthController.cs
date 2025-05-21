using System.Net;
using Graphic.Api.Models;
using Graphic.Api.Models.Dto;
using Graphic.Api.Services;
using Graphic.Core.Abstractions;
using Graphic.DataAccess.Entities;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;

namespace Graphic.Api.Controllers;

public class AuthController : GraphicRootController
{
    readonly UserManager<UserEntity> _userManager;
    readonly RoleManager<IdentityRole> _roleManager;
    readonly JwtTokenGenerator _jwtTokenGenerator;
    readonly IUsersService _usersService;

    public AuthController(UserManager<UserEntity> userManager, RoleManager<IdentityRole> roleManager, JwtTokenGenerator jwtTokenGenerator, IUsersService usersService)
    {
        _userManager = userManager;
        _roleManager = roleManager;
        _jwtTokenGenerator = jwtTokenGenerator;
        _usersService = usersService;
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
        
        var userFromDb = await _usersService.GetUserByEmail(loginRequest.Email);

        if (userFromDb is null || !await _usersService.CheckPassword(loginRequest.Email, loginRequest.Password))
            return BadRequest(new ServerResponse
            {
                IsSuccess = false,
                StatusCode = HttpStatusCode.BadRequest,
                ErrorMessages = { "Пользователь не найден" }
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
    
}