$(document).ready(function()
{
    $('#color-chooser').click(function(event)
    {
        if(event.target.className == "ink")
        {
            $('#color-chooser div').removeClass('selected');
            event.target.className = "ink selected";
        }
    });

    $('#button-save').click(function()
    {
        var developerName = $('#input-websiteName').val();
        var colorScheme = $('#color-chooser div.selected').css('background-color');
        var gridSize = $('input[name=gridwidth]:checked').val();
        var sortOrder = $('input[name=sortOrder]:checked').val();

        $.post("../helper/setGeneralSettingsToJSON.php",
            {
                "developerName": developerName,
                "colorScheme": rgb2hex(colorScheme),
                "gridSize": gridSize,
                "sortOrder": sortOrder
            },function(data,error)
            {
				location.reload(); 
            }
        );		
    });

    $('#updateButton').click(function () {
        var con = confirm("Do you want to really update codera?");
        if (con) {
            location.href = "updater.php";
        }

    });
	
	$('#button-discard').click(function()
    {		
       location.reload();      
    });
});