namespace Graphic.Api.Models.Dto;

public class UserUpdateDto
{
    public string? UserName { get; set; } 
    public string? Icon { get; set; } 
    public bool IsBlocked { get; set; } 
}