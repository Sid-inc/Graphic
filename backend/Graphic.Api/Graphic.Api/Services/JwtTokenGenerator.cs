using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;
using System.Text;
using Graphic.Api.Models;
using Microsoft.IdentityModel.Tokens;

namespace Graphic.Api.Services;

public class JwtTokenGenerator
{
    readonly string? _secretKey;
    
    public JwtTokenGenerator(IConfiguration configuration)
    {
        _secretKey = configuration["AuthSettings:SecretKey"];
    }

    public string? GenerateJwtToken(User user)
    {
        if (string.IsNullOrEmpty(_secretKey) 
            || string.IsNullOrWhiteSpace(user.Email)
            || string.IsNullOrWhiteSpace(user.UserName))
            return null;

        var tokenHandler = new JwtSecurityTokenHandler();
        var key = Encoding.ASCII.GetBytes(_secretKey);

        var tokenDescriptor = new SecurityTokenDescriptor
        {
            Subject = new ClaimsIdentity(new[]
            {
                new Claim(nameof(user.Id), user.Id),
                new Claim(ClaimTypes.Email, user.Email),
                new Claim(ClaimTypes.Name, user.UserName)
            }),
            Expires = DateTime.UtcNow.AddDays(1),
            SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha512Signature)
        };
        
        var token = tokenHandler.CreateToken(tokenDescriptor);
        return tokenHandler.WriteToken(token);
    }
}