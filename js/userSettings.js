
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

function saveUser(newUsername, username, password)
{
    var accountType = $('#toggle-user-is-admin').is(':checked');
    var loggedInUser = getLoggedInUser();

    if (!accountType)
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
            "forbiddenProjects": JSON.stringify(getForbiddenProjects()),
            "accountType": accountType
        },
        function (data, error)
        {
            if (newUsername != username.trim() && username.trim() != "New User" && username == loggedInUser)
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

$(document).ready(function()
{
	document.getElementById('userSettings-message').style.display='none';		
	
    $('#userSettings-button-save').click(function ()
    {
        var newUsername = $('#userSettings-input-userName').val();
        var username = $('#new-user').text().trim();
        var password = $('#userSettings-input-userPassword').val();
        var confirmPassword = $('#userSettings-input-userPassword_confirm').val();
		
				
        if(username != "admin")
		{			
			if(username != "public")
			{			
				if(newUsername != "" && newUsername != undefined && newUsername != null)
				{
					if (username == "New User")
					{
						if(password != null && password != "" && password != undefined)
						{
							if (password == confirmPassword)
							{
								saveUser(newUsername, username, password);
							}
							else
							{
								document.getElementById('userSettings-message').style.display = '';
								document.getElementById('userSettings-message-text').innerHTML = "The confirmation doesn't match your new password.";
							}
						}
						else
						{
							document.getElementById('userSettings-message').style.display = '';
							document.getElementById('userSettings-message-text').innerHTML = "The password fields shouldn't be empty.";
						}
					}
					else
					{
					   //bestehender Nutzer
					   if (password == confirmPassword)
					   {
						   saveUser(newUsername, username, password);
					   }
					   else
					   {
							document.getElementById('userSettings-message').style.display = '';
							document.getElementById('userSettings-message-text').innerHTML = "The confirmation doesn't match your new password.";
					   }
					}
				}							
				else
				{
					document.getElementById('userSettings-message').style.display = '';
					document.getElementById('userSettings-message-text').innerHTML = "Username shouldn't be empty.";	
				}
			}
			//public settings
			else
			{				
				saveUser(username, username, password);				
			}
		}
		else
		{
			//Superadmin tries to change his password						
			if (password == confirmPassword)
			{
				saveUser(username, username, password);
			}
			else
			{
				document.getElementById('userSettings-message').style.display = '';
				document.getElementById('userSettings-message-text').innerHTML = "The confirmation doesn't match your new password.";
			}					
		}
    });
	
	$('#userSettings-button-discard').click(function()
    {		
        window.document.location.href = "../restricted/admin.php";       
    });
});