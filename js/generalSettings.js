$(document).ready(function()
{
    var coderaVersionURL = "https://spaghettic0der.noip.me/codera/config/version.txt"; //TODO use gitHub url, when public
    //gets current codera version from url
    $.get(coderaVersionURL,function(data)
    {
        $('#codera-version-right-onLine').text(data.split("\n")[0]);
    });


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

        $.post("../helper/setGeneralSettingsToJSON.php",
            {
                "developerName": developerName,
                "colorScheme": rgb2hex(colorScheme),
                "gridSize": gridSize
            },function(data,error)
            {
				location.reload(); 
            }
        );		
    });
});