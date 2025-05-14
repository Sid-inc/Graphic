using Microsoft.AspNetCore.Identity;

namespace Graphic.Api.Models;

public class User : IdentityUser
{
    public string? Icon { get; set; }
}