using Graphic.Api.Extensions;
using Graphic.Application.Services;
using Graphic.Core.Abstractions;
using Graphic.DataAccess.Repositories;

var builder = WebApplication.CreateBuilder(args);

builder.Services.AddControllers();
builder.Services.AddEndpointsApiExplorer();
builder.Services.AddSwaggerGen();
builder.Services.AddPostgreSqlDbContext(builder.Configuration);
builder.Services.AddPostgreSqlIdentityContext();
builder.Services.AddConfigureIdentityOptions();
builder.Services.AddJwtTokenGenerator();
builder.Services.AddAuthenticationConfig(builder.Configuration);
builder.Services.AddCors();

builder.Services.AddScoped<IUsersService, UsersService>();
builder.Services.AddScoped<IUsersRepository, UsersRepository>();

var app = builder.Build();
app.MapControllers();

if (app.Environment.IsDevelopment())
{
    app.UseSwagger();
    app.UseSwaggerUI();
}

app.UseHttpsRedirection();
app.UseCors(o =>
{
    o.AllowAnyHeader()
        .AllowAnyMethod()
        .AllowAnyOrigin()
        .WithExposedHeaders("*");
}); // TODO: Исправить при слиянии в мастер.

app.UseAuthentication();
app.UseAuthorization();

await app.Services.InitializeRolesAsync();

app.Run();
