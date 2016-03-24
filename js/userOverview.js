$(document).ready(function () 
{
    $('a[name=userOverviewEdit]').click(function()
    {
        var form = document.createElement('form');
        form.method = "POST";
        form.action = "userSettings.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "username";
        input.value = this.id.split("_")[1];

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
    
});
