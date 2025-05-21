using Graphic.DataAccess.Entities;
using Microsoft.EntityFrameworkCore;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;

namespace Graphic.DataAccess;

public class UsersDbContext : IdentityDbContext
{
    public UsersDbContext(DbContextOptions<UsersDbContext> options) : base(options)
    {
    }
    
    public DbSet<UserEntity> GraphicUsers { get; set; }
}