$(document).ready(function()
{
    $('#button-save').click(function()
    {
        var name = $('#input-appName').val();
        var icon = $('#input-icon').val();
        var versionCode = $('#input-versionCode').val();
        var versionName = $('#input-versionName').val();
        var date = $('#input-date').val();
        var latestChanges = $('#input-changes').val();
        var description = $('#input-description').val();
        var requirements = $('#input-requirements').val();
        var license = $('#input-license').val();


        $.post("../helper/addProjectToJSON.php",
            {
                "name": name,
                "icon": icon,
                "versionName": versionName,
                "date": date,
                "latestChanges": latestChanges,
                "description":description,
                "requirements":requirements,
                "files": "http://cdn.cultofmac.com/wp-content/uploads/2010/12/BATTLEFIELD_-BAD-COMPANY%E2%84%A2-2.jpg",
                "screenshots": "http://cdn.cultofandroid.com/wp-content/uploads/2013/10/Battlefield-Bad-Company-2-mobile-review.jpg",
                "license": license,
                "versionCode": versionCode

            },
            function (data, status)
            {
                location.href = "admin.php";
                //alert("Data: " + data + "\nStatus: " + status);
            });

    });
});