using Microsoft.AspNetCore.Identity;

namespace Graphic.DataAccess.Entities;

public class UserEntity : IdentityUser
{
    public string? Icon { get; set; }
    public bool IsBlocked { get; set; }
}