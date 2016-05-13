$(document).ready(function ()
{
	//selects last opened tab
	if(localStorage.getItem('tab') != null)
	{		
		var lastTab = localStorage.getItem('tab');		

		$('.tabs ' + lastTab).show().siblings().hide();		
	
		$(lastTab + "-list-element").addClass('active').siblings().removeClass('active');
	}
	
    //tabView
    $('.tabs .tab-links a').on('click', function(e)
    {
        var currentAttrValue = $(this).attr('href');
		
        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

		e.preventDefault();		
		
		localStorage.setItem('tab', currentAttrValue);		
    });	
});