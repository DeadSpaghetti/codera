$(document).ready(function()
{
    $('#account-button-save').click(function ()
    {
        var username = $('#new-user').text().trim();
		var password = $('#account-input-new-password').val();
        var oldPassword = $('#account-input-old-password').val();
        var passwordRepeat = $('#account-input-new-password_repeat').val();

        if(password == passwordRepeat && password != null && password != "" && password != undefined)
        {
                $.post("../helper/changeUserPassword.php",
                    {
                        "oldPassword": oldPassword,
                        "password": password
                    },
                    function (data, error)
                    {
                        if(data == "denied")
                        {
                           alert("No permission or oldPassword doesn't match!");
                        }
                        else
                        {
                            alert("Password changed!");
                            location.href = "../logoutAndRedirectToLogin.php";
                        }
                    });
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