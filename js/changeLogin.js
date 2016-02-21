$(document).ready(function()
{
	document.getElementById('icon-warn').style.display='none';	
	document.getElementById('icon-success').style.display='none';	
	
    $('#button-save-changeLogin').click(function()
    {
        var oldUsername = $('#input-username-old').val();
        var oldPassword = $('#input-password-old').val();
        var newUsername = $('#input-username-new').val();
        var newPassword = $('#input-password-new').val();

        $.post("../helper/checkLogin.php",
            {
                "username":oldUsername,
                "password":oldPassword
            },function(data,error)
            {
                //correct credentials
                if (data.indexOf("success") > -1)
                {
                    $.post("../helper/checkLogin.php",
                        {
                            "username": newUsername,
                            "password": newPassword,
                            "forceOverride": true
                        },function(data,error)
                        {
                            
                        })
					document.getElementById('icon-warn').style.display = 'none';
					document.getElementById('icon-success').style.display = '';
                }
				else
				{
					document.getElementById('icon-warn').style.display = '';
				}
			}
        )
    });
	
	$('#button-discard-changeLogin').click(function()
    {
		$('#input-username-old').val('');
        $('#input-password-old').val('');
        $('#input-username-new').val('');
        $('#input-password-new').val('');
	});
});