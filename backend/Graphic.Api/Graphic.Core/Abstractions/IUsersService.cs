using Graphic.Core.Models;

namespace Graphic.Core.Abstractions;

public interface IUsersService
{
    Task<List<User>> GetAllUsers();
    Task<User?> GetUserById(string id);
    Task<User?> GetUserByEmail(string email);
    Task<User?> CreateUser(User user, string password);
    Task<string> UpdateUser(string userId, string? userName, string? icon, bool isBlocked);
    Task<bool> CheckPassword(string email, string password);
}