function saveProject(UUID)
{
    var name = $('#input-appName').val();
    var icon = $('#projectSettings-iconSelector').find(":selected").text();
    var versionCode = $('#input-versionCode').val();
    var versionName = $('#input-versionName').val();
    var date = $('#input-date').val();
    var latestChanges = $('#input-changes').val();
    var description = $('#input-description').val();
    var requirements = $('#input-requirements').val();
    var license = $('#projectSettings-licenseSelector').find(":selected").text();
    var projectStatus = $('input[name=projectStatus]:checked').val();
    var files = [];
    var screenshots = [];


	 
    $('#projectSettings-fileSelector :selected').each(function(i,selected)
    {
        files.push($(selected).text());
    });
    $('#projectSettings-screenshotSelector :selected').each(function(j,selected)
    {
        screenshots.push($(selected).text());
    });

    $.post("../helper/addProjectToJSON.php",
        {
            "name": name.trim(),
            "icon": icon,
            "versionName": versionName.trim(),
            "date": date,
            "latestChanges": latestChanges.trim(),
            "description":description.trim(),
            "requirements":requirements.trim(),
            "files": JSON.stringify(files),
            "screenshots": JSON.stringify(screenshots),
            "license": license,
            "versionCode": versionCode.trim(),
            "UUID": UUID.toString().trim(),
            "projectStatus": projectStatus
        },
        function (data, status)
        {
            location.href = "admin.php";
        });
}

$(document).ready(function()
{
    $('#projectSettings-iconSelector').chosen();
    $('#projectSettings-licenseSelector').chosen();
    $('#projectSettings-fileSelector').chosen();
    $('#projectSettings-screenshotSelector').chosen();
    $('#input-date').pickadate({
        format: 'dd.mm.yyyy',
        formatSubmit: 'dd.mm.yyyy'
    });

    var urlChecked = $('#toggle-project-or-url').is(':checked');
    if(urlChecked)
        toggleURL();


    $('#button-save').click(function()
    {
        var UUID = $('#projectSettingsUUID').text();
        if(UUID != null && UUID != "")
        {
            $.post("../helper/removeProjectFromJSON.php",
            {
                "UUID" : UUID.toString().trim()
            },function(data,error)
            {
                saveProject(UUID);
            });
        }
        else
        {
            saveProject(null);
        }
    });

    function toggleURL()
    {
        //URL selected
        var elementsToHide = document.getElementsByClassName("row-settingsNormal");
        for (var x = 0; x < elementsToHide.length; x++)
        {
            elementsToHide[x].style.display="none";
        }

        var elementsToShow = document.getElementsByClassName("row-settingsURL");
        for (var j = 0; j < elementsToShow.length; j++)
        {
            elementsToShow[j].style.display="";
        }
    }
	
	//Toggle-Button "Project" or "URL"
    $('#toggle-project-or-url').click(function()
    {
        if($(this).is(':checked'))
		{
			toggleURL();
		}
		else
		{
			//Project selected

            var elementsToHide = document.getElementsByClassName("row-settingsURL");
			for (var i = 0; i < elementsToHide.length; i++)
			{
				elementsToHide[i].style.display="none";
			}

            var elementsToShow = document.getElementsByClassName("row-settingsNormal");
			for (var c = 0; c < elementsToShow.length; c++)
			{
				elementsToShow[c].style.display="";
			}
		}
    });
});