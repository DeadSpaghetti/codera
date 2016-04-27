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

    //user types in the salt to use for encryption
    $('#button-continue-step3').click(function ()
    {
        $.post("setSalt.php",
            {
                "inputString": $('#installer-input-salt').val()
            },function (data,error)
            {
                changeStep(4);
            });
    });

    //admin password is typed in
    $('#button-continue-step4').click(function ()
    {
        var password = $('#installer-input-password').val();
        if(password != null && password != "" && password != undefined)
        {
            $.post("createAdmin.php",
                {
                    "password": password

                }, function (data, error)
                {
                    changeStep(5);
                });
        }
        else
        {
            //gedöns
        }
    });
	
	 $('#button-continue-step5').click(function ()
    {       
       changeStep(6);
   });

    $('#installer-button-finish').click(function()
    {
        location.href = "deleteInstaller.php";
    });

});