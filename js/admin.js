var rangeValues =
{
    "3": "3x3",
    "4": "4x4",
    "5": "5x5"
};


$(document).ready(function ()
{

    // on page load, set the text of the label based the value of the range
    $('#slider-label').text(rangeValues[$('#input-gridsize').val()]);

    //slider
    // setup an event handler to set the text when the range value is dragged (see event for input) or changed (see event for change)
    $('#input-gridsize').on('input change', function ()
    {
        $('#slider-label').text(rangeValues[$(this).val()]);
    });

    //tabView
    $('.tabs .tab-links a').on('click', function(e)
    {
        var currentAttrValue = $(this).attr('href');

        // Show/Hide Tabs
        $('.tabs ' + currentAttrValue).show().siblings().hide();

        // Change/remove current tab to active
        $(this).parent('li').addClass('active').siblings().removeClass('active');

        e.preventDefault();
    });

});