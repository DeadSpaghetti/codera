$(document).ready(function()
{
	document.getElementById('login-message').style.display='none';		
	
    $('#button-login').click(function()
    {	
       login();
    });
	
	$('#input-password').keyup(function(e)
    {	
        if(e.keyCode === 13)    //Enter
		{
           login();
        }       
    });
	
	function login()
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
                    data = data.toString().trim();
                    if (data != "failure")
                    {
                        if(data == "admin")
                        {
                            location.href = "../php/restricted/admin.php";
                        }
                        else if(data == "user")
                        {
                            location.href = "../php/index.php";
                        }

                    }
                    else
                    {
                        document.getElementById('login-message').style.display = '';
                    }
                });
        }
	}
});