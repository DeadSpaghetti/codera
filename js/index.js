$(document).ready(function()
{
    $('a').click(function()
    {
        var form = document.createElement('form');
        form.method = "GET";
        form.action = "template.php";
        var input = document.createElement('input');
        input.type = "text";
        input.name = "UUID";
        input.value = this.id;

        form.appendChild(input);
        document.body.appendChild(form);
        form.submit();
    });

});

function makeRequestAndSetBanners(currentCanvas,color,id)
{	
    $.post("helper/getProjectStatus.php",
        {
            "UUID": id.toString().trim()
        },function(data,error)
        {
            var status = data;
				
            if(currentCanvas.getContext != null)
            {
                var ctx = currentCanvas.getContext("2d");

                var width = currentCanvas.width;
                var height = currentCanvas.height;

                ctx.font = "55px Roboto";

                if(status == "Alpha")
                {
                    ctx.fillStyle = color;
                    ctx.fillRect(0.3*width, 0.75*height, 0.7*width, 0.25*height);
                    ctx.fillStyle = "#FFFFFF";
                    ctx.fillText(status.toString().toUpperCase(),0.36*width, 0.94*height);
                }
                else if(status == "Beta")
                {
                    ctx.fillStyle = color;
                    ctx.fillRect(0.3*width, 0.75*height, 0.7*width, 0.25*height);
                    ctx.fillStyle = "#FFFFFF";
                    ctx.fillText(status.toString().toUpperCase(),0.46*width, 0.94*height);
                }
            }
        }
    );
}

function drawBanners(color)
{

	var links = document.getElementsByName("icon-link");
	
	for(var i = 0; i < links.length; i++)
	{		
		var currentLink = links[i];
		var id = currentLink.id;
		var currentCanvas = currentLink.childNodes[0].childNodes[1];		
	
        makeRequestAndSetBanners(currentCanvas,color,id);
	}
}