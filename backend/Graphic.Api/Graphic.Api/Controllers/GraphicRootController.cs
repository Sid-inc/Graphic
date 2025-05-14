using Graphic.Api.Data;
using Microsoft.AspNetCore.Mvc;

namespace Graphic.Api.Controllers;

[ApiController]
[Route("api/[controller]/[action]")]
public class GraphicRootController : ControllerBase
{
    protected readonly AppDbContext DbContext;

    public GraphicRootController(AppDbContext dbContext)
    {
        DbContext = dbContext;
    }
}