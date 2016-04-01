// Documentation for client options:
// https://github.com/Studio-42/elFinder/wiki/Client-configuration-options
$(document).ready(function() {

	$('#elfinder').elfinder({
		url : '../../js/libs/elFinder/php/connector.php',  // connector URL (REQUIRED)
		resizable : false,
		uiOptions : {
			// toolbar configuration
			toolbar : [
				['back', 'forward'],				
				['upload'],
				['open', 'download', 'getfile'],
				['info'],
				['quicklook'],
				['copy', 'cut', 'paste'],
				['rm'],
				['duplicate', 'rename', 'edit', 'resize'],
				['extract', 'archive'],
				['search'],
				['view'],
				['help']
			],

			// directories tree options
			tree : {
				// expand current root on init
				openRootOnLoad : true,
				// auto load current dir parents
				syncTree : true
			},

			// navbar options
			navbar : {
				minWidth : 150,
				maxWidth : 500
			},

			// current working directory options
			cwd : {
				// display parent directory in listing as ".."
				oldSchool : false
			}
		}
		// , lang: 'de'                    // language (OPTIONAL)
	});
});