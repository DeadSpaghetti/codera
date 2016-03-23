$(document).ready(function () 
{
    $('#userOverviewEdit').click(function()
    {
        var form = document.createElement('form');
        form.method = "POST";
        form.action = "restricted/userSettings.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "userName";
        input.value = $('#templateUUID').text().trim();

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });
    
});
