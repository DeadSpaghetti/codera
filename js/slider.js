var rangeValues =
{
	"3": "3x3",
	"4": "4x4",
	"5": "5x5"   
};

$(function () {

	// on page load, set the text of the label based the value of the range
	$('#slider-label').text(rangeValues[$('#input-gridsize').val()]);

	// setup an event handler to set the text when the range value is dragged (see event for input) or changed (see event for change)
	$('#input-gridsize').on('input change', function () {
		$('#slider-label').text(rangeValues[$(this).val()]);
	});

});