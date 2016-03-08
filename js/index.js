$(document).ready(function()
{
    $('a').click(function()
    {
        var form = document.createElement('form');
        form.method = "GET";
        form.action = "template.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "UUID";
        input.value = this.id;


        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });


});