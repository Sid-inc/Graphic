using Microsoft.AspNetCore.Identity;

namespace Graphic.Core.Models;

public class User : IdentityUser
{
    public string? Icon { get; set; }
    public bool IsBlocked { get; set; }
}