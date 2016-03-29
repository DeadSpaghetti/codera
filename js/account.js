$(document).ready(function()
{
    $('#account-button-save').click(function ()
    {
        var username = $('#new-user').text().trim();
		var password = $('#account-input-new-password').val();
        var passwordRepeat = $('#account-input-new-password_repeat').val();

        if(password == passwordRepeat && password != null && password != "")
        {
            var forbiddenProjects = [];
            var accountType = "user";

            if (password == "" || password == undefined || password == null) {

            }
            else
            {
                $.post("../helper/addUserToJSON.php",
                    {
                        "username": username,
                        "password": password,
                        "forbiddenProjects": JSON.stringify(forbiddenProjects),
                        "accountType": accountType
                    },
                    function (data, error)
                    {
                        location.href = "../logoutAndRedirectToLogin.php";
                    });
            }
        }
        else
        {
            alert("Please check your password!");
        }
    });
	
	$('#account-button-discard').click(function()
    {		
        window.document.location.href = "../index.php";       
    });
});