$(document).ready(function ()
{
    openTab();

    function openTab()
    {
        /*
        if(localStorage.getItem("activeTab") != null)
        {
            var activeTabID = localStorage.getItem("activeTab");
            var activeTab = $('.tabs '+ activeTabID);
            activeTab.show();
            activeTab.siblings().hide();


            $(activeTabID).parent().addClass("active");
            console.log($(activeTabID).parent());
            $('.tabs .tab-links a ' +activeTabID)
        }
        */
    }

    //tabView
    $('.tabs .tab-links a').on('click', function(e)
    {
        var currentAttrValue = $(this).attr('href');
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();
        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        localStorage.setItem("activeTab",$(this).attr('href'));
        e.preventDefault();

    });	
});