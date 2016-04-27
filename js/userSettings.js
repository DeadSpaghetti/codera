
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
        var loggedInUser = getLoggedInUser();

        if(newUsername != "" && newUsername != undefined && newUsername != null)
        {
            if (username == "New User")
            {
                if(password != null && password != "" && password != undefined)
                {
                    if (password == confirmPassword)
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
                                if (newUsername != username && username.trim() != "New User" && username == loggedInUser)
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
                        //password stimmt nicht überein
                    }
                }
                else
                {
                    //passwort ist leer
                }

            }
            else
            {
                //bestehender Nutzer
               if (password == confirmPassword)
               {

               }
               else
               {
                   //passwort stimmt nicht überein
               }

            }
        }
        else
        {
           //username empty
        }

    });
	
	$('#userSettings-button-discard').click(function()
    {		
        window.document.location.href = "../restricted/admin.php";       
    });
});