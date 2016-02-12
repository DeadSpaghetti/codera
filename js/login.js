$(document).ready(function()
{
    $('#button-login').click(function()
    {
        var username = $('#input-username').val();
        var password = $('#input-password').val();

        $.post('../php/checkLogin.php',
            {
                "username": username,
                "password": password

            },function(data,error)
            {
                alert(data);
            });

    });
});