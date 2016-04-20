$(document).ready(function()
{
    function changeStep(step)
    {
        var form = document.createElement('form');
        form.method = "GET";
        form.action = "installer.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "step";
        input.value = step;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    }


    $('#button-continue-step0').click(function ()
    {
        changeStep(1);
    });

    $('#button-continue-step1').click(function ()
    {
        changeStep(2);
    });

    $('#button-continue-step2').click(function ()
    {
        changeStep(3);
    });

    $('#button-continue-step3').click(function ()
    {
        changeStep(4);
    });

    $('#button-continue-step4').click(function ()
    {
        changeStep(5);
    });

    $('#installer-button-finish').click(function()
    {
        window.document.location.href = "./index.php";
    });

});