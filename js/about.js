$(document).ready(function ()
{
    var a_tags = document.getElementsByTagName("a");
    for (var i = 0; i < a_tags.length; i++)
    {
        if (a_tags[i].id == "" && a_tags[i].className == "" && a_tags[i].parentNode.classList.contains("about-right"))
            a_tags[i].className = "link-visible";
    }

});