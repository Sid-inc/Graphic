using Graphic.Core.Abstractions;
using Graphic.Core.Common;
using Graphic.Core.Models;
using Graphic.DataAccess.Entities;
using Microsoft.AspNetCore.Identity;
using Microsoft.EntityFrameworkCore;

namespace Graphic.DataAccess.Repositories;

public class UsersRepository : IUsersRepository
{
    readonly UsersDbContext _context;
    readonly UserManager<UserEntity> _userManager;

    public UsersRepository(UsersDbContext context, UserManager<UserEntity> userManager)
    {
        _context = context;
        _userManager = userManager;
    }

    public async Task<List<User>> GetAll()
    {
        var usersFromDb = await _context.GraphicUsers
            .AsNoTracking()
            .ToListAsync();

        var users = usersFromDb.Select(u => new User
        {
            Id = u.Id,
            Email = u.Email,
            UserName = u.UserName,
            Icon = u.Icon,
            IsBlocked = u.IsBlocked
        }).ToList();
        
        return users;
    }

    public async Task<User?> GetById(string id)
    {
        var userFromDb = await _context.GraphicUsers
            .AsNoTracking()
            .FirstOrDefaultAsync(u => u.Id == id);
        
        if (userFromDb is null)
            return null;
        
        return new User
        {
            Id = userFromDb.Id,
            UserName = userFromDb.UserName,
            Email = userFromDb.Email,
            Icon = userFromDb.Icon,
            IsBlocked = userFromDb.IsBlocked
        };
    }
    
    public async Task<User?> GetByEmail(string email)
    {
        var userFromDb = await _context.GraphicUsers
            .AsNoTracking()
            .FirstOrDefaultAsync(u => u.Email == email);
        
        if (userFromDb is null)
            return null;
        
        return new User
        {
            Id = userFromDb.Id,
            UserName = userFromDb.UserName,
            Email = userFromDb.Email,
            Icon = userFromDb.Icon,
            IsBlocked = userFromDb.IsBlocked
        };
    }

    public async Task<User?> Create(User user, string password)
    {
        var newUser = new UserEntity
        {
            Email = user.Email,
            UserName = user.UserName ?? user.Email,
        };
        
        var result = await _userManager.CreateAsync(newUser, password);
        if (!result.Succeeded)
            return null;
        
        await _userManager.AddToRoleAsync(newUser, SharedData.Roles.Owner);
        return new User
        {
            Id = newUser.Id,
            Email = newUser.Email
        };
    }

    public async Task<string> Update(string userId, string? userName, string? icon, bool isBlocked)
    {
        await _context.GraphicUsers
            .Where(u => u.Id == userId)
            .ExecuteUpdateAsync(x => x
                .SetProperty(u => u.UserName, u => userName)
                .SetProperty(u => u.Icon, u => icon)
                .SetProperty(u => u.IsBlocked, u => isBlocked));

        return userId;
    }

    public async Task<bool> CheckPassword(string email, string password)
    {
        var userFromDb = await _context.GraphicUsers
            .AsNoTracking()
            .FirstOrDefaultAsync(u => u.Email == email);;

        if (userFromDb is null)
            return false;

        return await _userManager.CheckPasswordAsync(userFromDb, password);
    }
}