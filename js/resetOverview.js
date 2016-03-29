$(document).ready(function ()
{
   $('#button-reset-settings').click(function ()
   {
       var confirmDialog = confirm("Do you really want to reset all settings of codera?");
       if(confirmDialog)
       {
            reset("settings");
       }
   });
    
    $('#button-reset-everything').click(function ()
    {
        var confirmDialog = confirm("Do you really want to reset everything?");
        if(confirmDialog)
        {
            reset("everything");
        }
    });

    $('#button-reset-content').click(function ()
    {
        var confirmDialog = confirm("Do you really want to reset all your content?");
        if(confirmDialog)
        {
            reset("content");
        }
    });

});

function reset(type)
{
    $.post("../helper/resetHelper.php",
        {
            "resetType": type
        },function (data,error)
        {
			window.document.location.href = "../logout.php"; 
        });
}