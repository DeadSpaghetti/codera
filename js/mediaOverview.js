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
		},
		contextmenu : {
			// navbarfolder menu
			navbar : ['open', '|', 'copy', 'cut', 'paste', 'duplicate', '|', 'rm', '|', 'info'],

			// current directory menu
			cwd    : ['reload', 'back', '|', 'upload', 'paste', '|', 'info'],

			// current directory file menu
			files  : [
				'getfile', '|','open', 'quicklook', '|', 'download', '|', 'copy', 'cut', 'paste', 'duplicate', '|',
				'rm', '|', 'edit', 'rename', 'resize', '|', 'archive', 'extract', '|', 'info'
			]
		},
		// , lang: 'de'                    // language (OPTIONAL)
	});
});