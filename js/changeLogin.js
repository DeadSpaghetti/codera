$(document).ready(function()
{
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
                if(data == 'success')
                {
                    $.post("../helper/checkLogin.php",
                        {
                            "username": newUsername,
                            "password": newPassword,
                            "forceOverride": true
                        },function(data,error)
                        {
                            location.reload();
                        })
                }
            }

        )


    });


});