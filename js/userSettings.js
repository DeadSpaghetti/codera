$(document).ready(function()
{
    $('#userSettings-button-save').click(function ()
    {
        var username = $('#userSettings-input-userName').val();
        var password = $('#userSettings-input-userPassword').val();
        var forbiddenProjects = ""; //TODO Get every project from checkbox
        var accountType = $('#toggle-user-is-admin').is(':checked');
        if(accountType)
        {
            accountType = "admin"
        }
        else
        {
            accountType = "user"
        }

        $.post("../helper/addUserToJSON.php",
            {
                "username": username,
                "password": password,
                "forbiddenProjects":forbiddenProjects,
                "accountType": accountType
            },function (data,error)
            {
                location.reload();
            })

    });

});