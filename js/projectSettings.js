function urldecode(urlToDecode) {
  return decodeURIComponent(urlToDecode.replace(/\+/g, ' '));
}

function getName()
{
    return $('#input-appName').val().trim();
}

function getIcon()
{	
	return urldecode($('#projectSettings-iconSelector').find(":selected").attr('id'));
}

function getVersionCode()
{
    return $('#input-versionCode').val().trim();
}

function getVersionName()
{
    return $('#input-versionName').val().trim();
}

function getDate()
{
    return $('#input-date').val();
}

function getLatestChanges()
{
    return $('#input-changes').val().trim();
}

function getDescription()
{
    return $('#input-description').val().trim();
}

function getRequirements()
{
    return $('#input-requirements').val().trim();
}

function getLicense()
{
	return urldecode($('#projectSettings-licenseSelector').find(":selected").attr('id'));
}

function getProjectStatus()
{
    return $('input[name=projectStatus]:checked').val();
}

function getURL()
{
    return $('#input-url').val();
}

function getFiles()
{
    var files = [];
    $('#projectSettings-fileSelector :selected').each(function(i,selected)
    {
        files.push($(selected).text());
    });
    return files;
}

function getScreenshots()
{
    var screenshots = [];
    $('#projectSettings-screenshotSelector :selected').each(function(j,selected)
    {
        screenshots.push($(selected).text());
    });
    return screenshots;
}

function saveProject()
{
    $.post("../helper/addProjectToJSON.php",
        {
            "name": getName(),
            "icon": getIcon(),
            "versionName": getVersionName(),
            "date": getDate(),
            "latestChanges": getLatestChanges(),
            "description": getDescription(),
            "requirements": getRequirements(),
            "files": JSON.stringify(getFiles()),
            "screenshots": JSON.stringify(getScreenshots()),
            "license": getLicense(),
            "versionCode": getVersionCode(),
            "projectStatus": getProjectStatus(),
            "url": getURL()
        },
        function (data, status)
        {
            location.href = "admin.php";
        });
}

function updateProject(UUID)
{	
    $.post("../helper/updateProject.php",
        {			
            "name": getName(),
            "icon": getIcon(),
            "versionName": getVersionName(),
            "date": getDate(),
            "latestChanges": getLatestChanges(),
            "description": getDescription(),
            "requirements": getRequirements(),
            "files": JSON.stringify(getFiles()),
            "screenshots": JSON.stringify(getScreenshots()),
            "license": getLicense(),
            "versionCode": getVersionCode(),
            "projectStatus": getProjectStatus(),
            "url": getURL(),
            "UUID": UUID.toString().trim()
        },
        function (data, status)
        {
            location.href = "admin.php";
        });
}

$(document).ready(function()
{
    $('#projectSettings-iconSelector').select2();
    $('#projectSettings-licenseSelector').select2();
    $('#projectSettings-fileSelector').select2({
        tags: true,
        tokenSeparators: [',', ' ']
    });
    $('#projectSettings-screenshotSelector').select2();
    $('#input-date').pickadate({
        format: 'dd.mm.yyyy',
        formatSubmit: 'dd.mm.yyyy'
    });

    var urlChecked = $('#toggle-project-or-url').is(':checked');
    if(urlChecked)
	{
        toggleURL();
	}
	else
	{
		toggleProject();
	}


    $('#button-save').click(function()
    {
        var UUID = $('#projectSettingsUUID').text().trim();
        if(UUID != null && UUID != "" && UUID != undefined)
        {
            updateProject(UUID);
        }
        else
        {
            saveProject();
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
	
	function toggleProject()
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
	
	
	//Toggle-Button "Project" or "URL"
    $('#toggle-project-or-url').click(function()
    {
        if($(this).is(':checked'))
		{
			toggleURL();
		}
		else
		{			
			toggleProject();           
		}
    });
	
	$('#button-discard').click(function()
    {		
        window.document.location.href = "../restricted/admin.php";       
    });
});