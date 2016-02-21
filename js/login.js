$(document).ready(function()
{
	document.getElementById('login-message').style.display='none';
	
    $('#button-login').click(function()
    {	
        var username = $('#input-username').val();
        var password = $('#input-password').val();

        if(username != "" && username != undefined && password != "" && password != undefined)
        {		
            $.post('../php/helper/checkLogin.php',
                {
                    "username": username,
                    "password": password

                }, function (data, error)
                {					
                    if (data.indexOf("success") > -1)
                    {							
                        location.href = "../php/restricted/admin.php";
                    }
                    else
                    {
                        document.getElementById('login-message').style.display = '';
                    }
                });
        }
    });
});