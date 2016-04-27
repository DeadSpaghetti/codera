$(document).ready(function () 
{
    $('a[name=userOverviewEdit]').click(function()
    {
        var username = this.id.split("_")[1]; //editUser_username --> username
        var form = document.createElement('form');
        form.method = "POST";
        form.action = "userSettings.php";
        var input = document.createElement('input');
        input.type = "hidden";
        input.name = "username";
        input.value = username;
        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();

    });


    $('a[name=userOverviewDelete]').click(function()
    {
        var c = confirm("Do you really want to delete the account of " + this.id.split("_")[1]);
        if(c)
        {
            $.post("../helper/deleteUserFromJSON.php",
                {
                    "username": this.id.split("_")[1]
                }, function (data, error)
                {
                    location.reload();
                });
        }

    });
});
