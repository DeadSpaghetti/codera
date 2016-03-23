$(document).ready(function()
{
    $('#template-fileSelector').chosen();

    $('#button-download').click(function()
    {
        var filename = $('#template-fileSelector').val();

        var form = document.createElement('form');
        form.method = "GET";
        form.action = "helper/download.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "filename";
        input.value = filename;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();

        /*
        $.get("../php/helper/download.php",
            {
                "filename": filename
            },function(data,error)
            {

            })*/
    });
});

