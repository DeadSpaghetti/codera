$(document).ready(function()
{
    $('#aboutpage-iconSelector').select2();

    $('#button-save-about').click(function()
    {
        var aboutIcon = $('#aboutpage-iconSelector :selected').val();
        var aboutText = $('#input-about-text').val();

        $.post("../helper/setAboutPageToJSON.php",
        {
            "aboutIcon": aboutIcon,
            "aboutText": aboutText
        },
        function (data,error)
        {
            location.reload();
        });
    }); 
});