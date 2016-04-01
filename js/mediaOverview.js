// Documentation for client options:
// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
$(document).ready(function() {
	

	$('#elfinder').elfinder({
		url : '../../js/libs/elFinder/php/connector.php',  // connector URL (REQUIRED)
		resizable : false
		// , lang: 'de'                    // language (OPTIONAL)
	});
});