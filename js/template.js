function getFile()
{
	return $('#template-fileSelector').find(":selected").attr('id');
}

function changeLinks()
{
    var a_tags = document.getElementsByTagName("a");
    for (var i = 0; i < a_tags.length; i++)
    {
        if (a_tags[i].id == "" && a_tags[i].className == "" && a_tags[i].parentNode.classList.contains("infos-right"))
            a_tags[i].className = "link-visible";
    }
}

$(document).ready(function()
{
    changeLinks();
    $('#template-fileSelector').select2();

    $('#button-download').click(function()
    {
        var filename = getFile();
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
		form.style.display = "none";	
        document.body.appendChild(form);
        form.submit();
        
    });
});

