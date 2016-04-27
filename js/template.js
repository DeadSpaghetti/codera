$(document).ready(function()
{
    $('#template-fileSelector').chosen();

    $('#button-download').click(function()
    {
        var filename = $('#template-fileSelector').val();

        var form = document.createElement('form');
        form.method = "POST";
        form.action = "helper/download.php";
        var filenameInput = document.createElement('input');
        filenameInput.type = "hidden";
        filenameInput.name = "filename";
        filenameInput.value = filename;
        var UUIDInput = document.createElement('input');
        UUIDInput.type = "hidden";
        UUIDInput.name = "UUID";
        UUIDInput.value = $('#templateUUID').text().trim();

        form.appendChild(filenameInput);
        form.appendChild(UUIDInput);
        document.body.appendChild(form);
        form.submit();
        
    });
});

