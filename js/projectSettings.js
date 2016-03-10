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
    $('#input-date').pickadate();

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
});