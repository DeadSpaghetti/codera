$(document).ready(function ()
{
    function addViewToProject(UUID)
    {
        $.post
        ("helper/addViewToProject.php",
            {
                "UUID": UUID
            }, function (data, error)
            {
                //nothing to do
            }
        );
    }


    $('a').click(function(event)
    {		
		if(this.id != "toggle-dark-theme")
		{
			var form = document.createElement('form');
			form.method = "GET";
			form.action = "template.php";
			var input = document.createElement('input');
			input.type = "hidden";
			input.name = "UUID";
			input.value = this.id;

			addViewToProject(this.id);
			form.appendChild(input);
			form.style.display = "none";
			document.body.appendChild(form);
			form.submit();
		}
    });

});

function makeRequestAndSetBanners(canvasObjectArray, color) {
    $.post("helper/getProjectStatus.php",
        {
            "canvasObjectArray": JSON.stringify(canvasObjectArray)
        }, function (data, error)
        {
            canvasObjectArray = JSON.parse(data);
            if (canvasObjectArray != null)
            {
                for (var i = 0; i < canvasObjectArray.length; i++) {
                    var currentCanvas = document.getElementById(canvasObjectArray[i].id).childNodes[0].childNodes[1];
                    var status = canvasObjectArray[i].status;

                    if (currentCanvas.getContext != null) {
                        var ctx = currentCanvas.getContext("2d");

                        var width = currentCanvas.width;
                        var height = currentCanvas.height;

                        ctx.font = "55px Roboto";

                        if (status == "Alpha") {
                            ctx.fillStyle = color;
                            ctx.fillRect(0.3 * width, 0.75 * height, 0.7 * width, 0.25 * height);
                            if (color.toLowerCase() == "#fff176") {
                                ctx.fillStyle = "#212121";
                            }
                            else {
                                ctx.fillStyle = "#FFFFFF";
                            }
                            ctx.fillText(status.toString().toUpperCase(), 0.36 * width, 0.94 * height);
                        }
                        else if (status == "Beta") {
                            ctx.fillStyle = color;
                            ctx.fillRect(0.3 * width, 0.75 * height, 0.7 * width, 0.25 * height);
                            if (color.toLowerCase() == "#fff176") {
                                ctx.fillStyle = "#212121";
                            }
                            else {
                                ctx.fillStyle = "#FFFFFF";
                            }
                            ctx.fillText(status.toString().toUpperCase(), 0.43 * width, 0.94 * height);
                        }
                    }
                }
            }
        }
    );
}

function drawBanners(color)
{

    var links = document.getElementsByName("icon-link");
    var canvasObjectArray = [];
    for (var i = 0; i < links.length; i++) {
        var currentLink = links[i];
        var id = currentLink.id;
        var currentCanvasObject =
        {
            "currentLink": links[i],
            "id": links[i].id,
            "status": null
        };
        canvasObjectArray.push(currentCanvasObject);
    }
    if (canvasObjectArray.length > 0)
        makeRequestAndSetBanners(canvasObjectArray, color);
}