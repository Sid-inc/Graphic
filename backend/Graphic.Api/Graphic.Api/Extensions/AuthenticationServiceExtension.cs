using System.Text;
using Microsoft.AspNetCore.Authentication.JwtBearer;
using Microsoft.IdentityModel.Tokens;

namespace Graphic.Api.Extensions;

public static class AuthenticationServiceExtension
{
    public static IServiceCollection AddAuthenticationConfig(this IServiceCollection services, IConfiguration configuration)
    {
        var authSettingsToken = configuration["AuthSettings:SecretKey"];

        if (string.IsNullOrEmpty(authSettingsToken))
            return services;

        services.AddAuthentication(u =>
        {
            u.DefaultAuthenticateScheme = JwtBearerDefaults.AuthenticationScheme;
            u.DefaultChallengeScheme = JwtBearerDefaults.AuthenticationScheme;
        }).AddJwtBearer(u =>
        {
            u.RequireHttpsMetadata = false; // TODO: Включить при слиянии в мастер.
            u.SaveToken = true;
            u.TokenValidationParameters = new TokenValidationParameters
            {
                ValidateIssuerSigningKey = true,
                IssuerSigningKey = new SymmetricSecurityKey(Encoding.ASCII.GetBytes(authSettingsToken)),
                ValidateIssuer = false,
                ValidateAudience = false
            };
        });
        
        return services;
    }
}