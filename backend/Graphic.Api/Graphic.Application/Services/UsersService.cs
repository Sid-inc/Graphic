using Graphic.Core.Abstractions;
using Graphic.Core.Models;

namespace Graphic.Application.Services;

public class UsersService : IUsersService
{
    readonly IUsersRepository _usersRepository;

    public UsersService(IUsersRepository usersRepository)
    {
        _usersRepository = usersRepository;
    }

    public async Task<List<User>> GetAllUsers()
    {
        return await _usersRepository.GetAll();
    }

    public async Task<User?> GetUserById(string id)
    {
        return await _usersRepository.GetById(id);
    }

    public async Task<User?> GetUserByEmail(string email)
    {
        return await _usersRepository.GetByEmail(email);
    }

    public async Task<User?> CreateUser(User user, string password)
    {
        return await _usersRepository.Create(user, password);
    }

    public async Task<string> UpdateUser(string userId, string? userName, string? icon, bool isBlocked)
    {
        return await _usersRepository.Update(userId, userName, icon, isBlocked);
    }
    
    public async Task<bool> CheckPassword(string email, string password)
    {
        return await _usersRepository.CheckPassword(email, password);
    }
}