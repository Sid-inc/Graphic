using Graphic.Core.Models;

namespace Graphic.Core.Abstractions;

public interface IUsersRepository
{
    Task<List<User>> GetAll();
    Task<User?> GetById(string id);
    Task<User?> GetByEmail(string email);
    Task<User?> Create(User user, string password);
    Task<string> Update(string userId, string? userName, string? icon, bool isBlocked);
    Task<bool> CheckPassword(string email, string password);
}