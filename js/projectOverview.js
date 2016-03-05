$(document).ready(function()
{
    $('#projectOverviewEdit').click(function()
    {
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = '../restricted/projectSettingsEdit.php';

        var input = document.createElement('input');
        input.type = 'text';
        input.name = 'UUID';
        input.value = this.parentNode.parentNode.id;

        form.appendChild(input);
        form.submit();

    });

    $('#projectOverviewDelete').click(function()
    {
        var que = confirm("Do you want to delete this project?");
        if(que == true)
        {
            $.post("../helper/removeProjectFromJSON.php",
                {
                    "UUID": this.parentNode.parentNode.id

                }, function (data, error) {
                });

            location.reload();
        }
    });
});