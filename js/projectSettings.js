$(document).ready(function()
{
    $('#saveProjectButton').click(function()
    {
        alert("Works?");
        var name = $('#input-appName').val();
        var icon = $('#input-icon').val();
        var versionCode = $('#input-versionCode').val();
        var versionName = $('#input-versionName').val();
        var date = $('#input-date').val();
        var latestChanges = $('#input-changes').val();
        var description = $('#input-description').val();
        var requirements = $('#input-requirements').val();
        var license = $('#input-license').val();


        $.post("../php/addProjectToJSON.php",
            {
                "name": name,
                "icon": icon,
                "versionName": versionName,
                "date": date,
                "latestChanges": latestChanges,
                "files": "virus.exe",
                "screenshots": "timeKeep.jpg",
                "license": license,
                "versionCode": versionCode

            },
            function (data, status)
            {
                alert("Data: " + data + "\nStatus: " + status);
            });

    });
});