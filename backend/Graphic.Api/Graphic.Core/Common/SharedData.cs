namespace Graphic.Core.Common;

public static class SharedData
{
    public static class Roles
    {
        public const string Admin = "Admin";
        public const string Owner = "Owner";
        public const string Member = "Member";

        public static IReadOnlyList<string> AllRoles
        {
            get => new List<string> {Admin, Owner, Member};
        }
    }
}