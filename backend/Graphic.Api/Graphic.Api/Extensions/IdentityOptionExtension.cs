using Microsoft.AspNetCore.Identity;

namespace Graphic.Api.Extensions;

public static class IdentityOptionExtension
{
    public static IServiceCollection AddConfigureIdentityOptions(this IServiceCollection services)
    {
        services.Configure<IdentityOptions>(options =>
        {
            options.Password.RequireDigit = true;
            options.Password.RequiredLength = 10;
            options.Password.RequireNonAlphanumeric = true;
            options.Password.RequireUppercase = true;
            options.Password.RequireLowercase = true;
        });

        return services;
    }
}