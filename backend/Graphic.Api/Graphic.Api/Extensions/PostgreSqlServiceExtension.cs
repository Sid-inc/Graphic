using Graphic.Core.Models;
using Graphic.DataAccess;
using Graphic.DataAccess.Entities;
using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;

namespace Graphic.Api.Extensions;

public static class PostgreSqlServiceExtension
{
    public static void AddPostgreSqlDbContext(this IServiceCollection services, IConfiguration configuration)
    {
        services.AddDbContext<UsersDbContext>(options =>
        {
            options.UseNpgsql(configuration.GetConnectionString("PostgreSQLConnection"));
        });
    }

    public static void AddPostgreSqlIdentityContext(this IServiceCollection services)
    {
        services.AddIdentity<UserEntity, IdentityRole>().AddEntityFrameworkStores<UsersDbContext>();
    }
}