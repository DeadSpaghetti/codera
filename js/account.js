$(document).ready(function()
{
	document.getElementById('account-message').style.display='none';		
	
    $('#account-button-save').click(function ()
    {
        var username = $('#new-user').text().trim();
		var password = $('#account-input-new-password').val();
        var oldPassword = $('#account-input-old-password').val();
        var passwordRepeat = $('#account-input-new-password_repeat').val();

		if(password != null && password != "" && password != undefined)		
		{
			if(password == passwordRepeat)
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
								document.getElementById('account-message').style.display = '';
								document.getElementById('account-message-text').innerHTML = "No permissions or old password is incorrect.";
							}
							else
							{                          
								location.href = "../logoutAndRedirectToLogin.php";
							}
						});
			}
			else
			{
				document.getElementById('account-message').style.display = '';
				document.getElementById('account-message-text').innerHTML = "The confirmation doesn't match your new password.";
			}
			
		}
		else
		{
				document.getElementById('account-message').style.display = '';
				document.getElementById('account-message-text').innerHTML = "Please fill all the inputs.";
		}
    });
	
	$('#account-button-discard').click(function()
    {		
        window.document.location.href = "../index.php";       
    });
});