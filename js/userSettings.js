
function getForbiddenProjects()
{
    var forbiddenProjects = [];
    var userSettingsProjectCheckBoxes = document.getElementsByName("userSettingsProjectCheckBoxes");
    for(var i=0; i < userSettingsProjectCheckBoxes.length; i++)
    {
        if(userSettingsProjectCheckBoxes[i].checked)
            forbiddenProjects.push(userSettingsProjectCheckBoxes[i].id.split("_")[1]);
    }
    return forbiddenProjects;
}

$(document).ready(function()
{
    $('#userSettings-button-save').click(function ()
    {

        var newUsername = $('#userSettings-input-userName').val();
        var username = $('#new-user').text().trim();
        var password = $('#userSettings-input-userPassword').val();
        var confirmPassword = $('#userSettings-input-userPassword_confirm').val();
        var forbiddenProjects = getForbiddenProjects();

        if(username == "public")
        {
            $.post("../helper/addUserToJSON.php",
                {
                    "username": "public",
                    "newUsername": "public",
                    "forbiddenProjects": JSON.stringify(forbiddenProjects)
                },
                function (data, error)
                {
                    location.href = "admin.php";
                });
        }
        else if(username != "public" && password == confirmPassword && password != null && password != undefined)
        {
            var accountType = $('#toggle-user-is-admin').is(':checked');

            if (accountType)
            {
                accountType = "admin"
            }
            else
            {
                accountType = "user"
            }

            $.post("../helper/addUserToJSON.php",
                {
                    "newUsername": newUsername.toString().trim(),
                    "username": username.toString().trim(),
                    "password": password,
                    "forbiddenProjects": JSON.stringify(forbiddenProjects),
                    "accountType": accountType
                },
                function (data, error)
                {
                    if(newUsername != username && username.trim() != "New User")
                    {
                        alert("You're now logged out!");
                        location.href = "../logoutAndRedirectToLogin.php";
                    }
                    else
                    {
                        location.href = "admin.php";
                    }

                });
        }
        else
        {
            alert("Check your password!");
        }
    });
	
	$('#userSettings-button-discard').click(function()
    {		
        window.document.location.href = "../restricted/admin.php";       
    });
});