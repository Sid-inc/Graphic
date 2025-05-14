using Graphic.Api.Services;

namespace Graphic.Api.Extensions;

public static class JwtTokenGeneratorServiceExtension
{
    public static IServiceCollection AddJwtTokenGenerator(this IServiceCollection services)
    {
        return services.AddScoped<JwtTokenGenerator>();
    }
}