$(document).ready(function ()
{  
	$('#toggle-dark-theme').click(function ()
	{
		toggleDarkTheme();
	});

	function addClass(element, className)
	{
		if(element != null)
		{
			if(!element.classList.contains(className))
			{
				element.classList.add(className);			
			}
		}
	}
	
	function removeClass(element, className)
	{
		if(element != null)
		{
			if(element.classList.contains(className))
			{
				element.classList.remove(className);			
			}
		}
	}

	function activateDarkTheme()
	{
		var header = document.getElementById('header');
		addClass(header, "dark-4");		
		
		var footer = document.getElementById('footer');
		addClass(footer, "dark-4");
		
		var main = document.getElementById('main');
		addClass(main, "dark-2");
		
		var content = document.getElementById('content');
		addClass(content, "dark-2");		
		
		var white = document.getElementById('white');
		addClass(white, "dark-1");	
		addClass(white, "dark-shadow");			
		
		var loginWhite = document.getElementById('login-white');
		addClass(loginWhite, "dark-1");
		addClass(loginWhite, "dark-shadow");
		
		var loginTitle = document.getElementById('login-title');
		addClass(loginTitle, "white-text");	
		
		var appName = document.getElementById('app-name');
		addClass(appName, "white-text");	
		
		var aboutHeadline = document.getElementById('about-headline');
		addClass(aboutHeadline, "white-text");
	
		var buttonDownload = document.getElementById('button-download');
		addClass(buttonDownload, "normal-text");
		
		var newUser = document.getElementById('new-project');
		addClass(newUser, "white-text");	

		var newProject = document.getElementById('new-user');
		addClass(newUser, "white-text");	

		var buttonSave = document.getElementById('button-save');
		addClass(buttonSave, "normal-text");	

		var buttonDiscard = document.getElementById('button-discard');
		addClass(buttonDiscard, "normal-text");	
		
		var buttonSaveAbout = document.getElementById('button-save-about');
		addClass(buttonSaveAbout, "normal-text");	

		var buttonDiscardAbout = document.getElementById('button-discard-about');
		addClass(buttonDiscardAbout, "normal-text");	
		
		var userSettingsButtonSave = document.getElementById('userSettings-button-save');
		addClass(userSettingsButtonSave, "normal-text");	

		var userSettingsButtonDiscard = document.getElementById('userSettings-button-discard');
		addClass(userSettingsButtonDiscard, "normal-text");	
		
		var buttonNewUser = document.getElementById('button-new-user');
		addClass(buttonNewUser, "white-text");

		var buttonNewProject = document.getElementById('button-new-project');
		addClass(buttonNewProject, "white-text");		
		
		var iconNames = document.getElementsByClassName('icon-name');
		for(var i = 0; i < iconNames.length; i++)
		{
			addClass(iconNames[i], "white-text");
		}
		
		var lines = document.getElementsByClassName('line');
		for(var i = 0; i < lines.length; i++)
		{
			addClass(lines[i], "dark-line");
		}
		
		var aboutLines = document.getElementsByClassName('about-line');
		for(var i = 0; i < aboutLines.length; i++)
		{
			addClass(aboutLines[i], "dark-line");
		}
		
		var aboutHeadlinesSmall = document.getElementsByClassName('about-headline-small');
		for(var i = 0; i < aboutHeadlinesSmall.length; i++)
		{
			addClass(aboutHeadlinesSmall[i], "white-text");
		}
		
		var aboutRight = document.getElementsByClassName('about-right');
		for(var i = 0; i < aboutRight.length; i++)
		{
			addClass(aboutRight[i], "white-text");
		}
		
		var aboutText = document.getElementsByClassName('about-text');
		for(var i = 0; i < aboutText.length; i++)
		{
			addClass(aboutText[i], "white-text");
		}
		
		var aboutTextFull = document.getElementsByClassName('about-text-full');
		for(var i = 0; i < aboutTextFull.length; i++)
		{
			addClass(aboutTextFull[i], "white-text");
		}
		
		var icons = document.getElementsByClassName('icon');
		for(var i = 0; i < icons.length; i++)
		{
			addClass(icons[i], "white-text");
		}
		
		var infosRight = document.getElementsByClassName('infos-right');
		for(var i = 0; i < infosRight.length; i++)
		{
			addClass(infosRight[i], "white-text");
		}
		
		var userHeadlines = document.getElementsByClassName('user-headline');
		for(var i = 0; i < userHeadlines.length; i++)
		{
			addClass(userHeadlines[i], "white-text");
			addClass(userHeadlines[i], "dark-border-bottom");
		}
		
		var userProjectNames = document.getElementsByClassName('user-project-name');
		for(var i = 0; i < userProjectNames.length; i++)
		{
			addClass(userProjectNames[i], "white-text");			
		}
		
		var userLines = document.getElementsByClassName('user-line');
		for(var i = 0; i < userLines.length; i++)
		{
			addClass(userLines[i], "dark-border-bottom");			
		}
		
		var tabContents = document.getElementsByClassName('tab-content');
		for(var i = 0; i < tabContents.length; i++)
		{
			addClass(tabContents[i], "dark-1");
			addClass(tabContents[i], "dark-shadow");		
		}
		
		var inks = document.getElementsByClassName('ink');
		for(var i = 0; i < inks.length; i++)
		{
			addClass(inks[i], "dark-ink");					
		}
		
		var inksSelected = document.getElementsByClassName('ink selected');
		for(var i = 0; i < inksSelected.length; i++)
		{
			addClass(inksSelected[i], "dark-selected");					
		}
		
		var overviewDownloadCounter = document.getElementsByClassName('overview-download-counter');
		for(var i = 0; i < overviewDownloadCounter.length; i++)
		{
			addClass(overviewDownloadCounter[i], "white-text");					
		}
		
		var userOverviewAppnames = document.getElementsByClassName('user-overview-appname');
		for(var i = 0; i < userOverviewAppnames.length; i++)
		{
			addClass(userOverviewAppnames[i], "white-text");					
		}
		
		var overviewAppnames = document.getElementsByClassName('overview-appname');
		for(var i = 0; i < overviewAppnames.length; i++)
		{
			addClass(overviewAppnames[i], "white-text");					
		}
		
		var overviewRight = document.getElementsByClassName('overview-right');
		for(var i = 0; i < overviewRight.length; i++)
		{
			addClass(overviewRight[i], "white-text");					
		}
		
		var overviewLines = document.getElementsByClassName('overview-line');
		for(var i = 0; i < overviewLines.length; i++)
		{
			addClass(overviewLines[i], "dark-border-bottom");					
		}
		
		var infosCenter = document.getElementsByClassName('infos-center');
		for(var i = 0; i < infosCenter.length; i++)
		{
			addClass(infosCenter[i], "white-text");					
		}
		
		var tabLinks = document.getElementsByClassName('tab-links-header');
		for(var i = 0; i < tabLinks.length; i++)
		{
			addClass(tabLinks[i], "dark-tab-header");					
		}
		
		var buttonsReset = document.getElementsByClassName('button reset');
		for(var i = 0; i < buttonsReset.length; i++)
		{
			addClass(buttonsReset[i], "white-text");					
		}	
	}
	
	function deactivateDarkTheme()
	{
		var header = document.getElementById('header');
		removeClass(header, "dark-4");		
		
		var footer = document.getElementById('footer');
		removeClass(footer, "dark-4");
		
		var main = document.getElementById('main');
		removeClass(main, "dark-2");
		
		var content = document.getElementById('content');
		removeClass(content, "dark-2");		
		
		var white = document.getElementById('white');
		removeClass(white, "dark-1");	
		removeClass(white, "dark-shadow");			
		
		var loginWhite = document.getElementById('login-white');
		removeClass(loginWhite, "dark-1");
		removeClass(loginWhite, "dark-shadow");
		
		var loginTitle = document.getElementById('login-title');
		removeClass(loginTitle, "white-text");	
		
		var appName = document.getElementById('app-name');
		removeClass(appName, "white-text");	
		
		var aboutHeadline = document.getElementById('about-headline');
		removeClass(aboutHeadline, "white-text");
	
		var buttonDownload = document.getElementById('button-download');
		removeClass(buttonDownload, "normal-text");
		
		var newUser = document.getElementById('new-project');
		removeClass(newUser, "white-text");	

		var newProject = document.getElementById('new-user');
		removeClass(newUser, "white-text");	

		var buttonSave = document.getElementById('button-save');
		removeClass(buttonSave, "normal-text");	

		var buttonDiscard = document.getElementById('button-discard');
		removeClass(buttonDiscard, "normal-text");	
		
		var buttonSaveAbout = document.getElementById('button-save-about');
		removeClass(buttonSaveAbout, "normal-text");	

		var buttonDiscardAbout = document.getElementById('button-discard-about');
		removeClass(buttonDiscardAbout, "normal-text");	
		
		var userSettingsButtonSave = document.getElementById('userSettings-button-save');
		removeClass(userSettingsButtonSave, "normal-text");	

		var userSettingsButtonDiscard = document.getElementById('userSettings-button-discard');
		removeClass(userSettingsButtonDiscard, "normal-text");	
		
		var buttonNewUser = document.getElementById('button-new-user');
		removeClass(buttonNewUser, "white-text");

		var buttonNewProject = document.getElementById('button-new-project');
		removeClass(buttonNewProject, "white-text");		
		
		var iconNames = document.getElementsByClassName('icon-name');
		for(var i = 0; i < iconNames.length; i++)
		{
			removeClass(iconNames[i], "white-text");
		}
		
		var lines = document.getElementsByClassName('line');
		for(var i = 0; i < lines.length; i++)
		{
			removeClass(lines[i], "dark-line");
		}
		
		var aboutLines = document.getElementsByClassName('about-line');
		for(var i = 0; i < aboutLines.length; i++)
		{
			removeClass(aboutLines[i], "dark-line");
		}
		
		var aboutHeadlinesSmall = document.getElementsByClassName('about-headline-small');
		for(var i = 0; i < aboutHeadlinesSmall.length; i++)
		{
			removeClass(aboutHeadlinesSmall[i], "white-text");
		}
		
		var aboutRight = document.getElementsByClassName('about-right');
		for(var i = 0; i < aboutRight.length; i++)
		{
			removeClass(aboutRight[i], "white-text");
		}
		
		var aboutText = document.getElementsByClassName('about-text');
		for(var i = 0; i < aboutText.length; i++)
		{
			removeClass(aboutText[i], "white-text");
		}
		
		var aboutTextFull = document.getElementsByClassName('about-text-full');
		for(var i = 0; i < aboutTextFull.length; i++)
		{
			removeClass(aboutTextFull[i], "white-text");
		}
		
		var icons = document.getElementsByClassName('icon');
		for(var i = 0; i < icons.length; i++)
		{
			removeClass(icons[i], "white-text");
		}
		
		var infosRight = document.getElementsByClassName('infos-right');
		for(var i = 0; i < infosRight.length; i++)
		{
			removeClass(infosRight[i], "white-text");
		}
		
		var userHeadlines = document.getElementsByClassName('user-headline');
		for(var i = 0; i < userHeadlines.length; i++)
		{
			removeClass(userHeadlines[i], "white-text");
			removeClass(userHeadlines[i], "dark-border-bottom");
		}
		
		var userProjectNames = document.getElementsByClassName('user-project-name');
		for(var i = 0; i < userProjectNames.length; i++)
		{
			removeClass(userProjectNames[i], "white-text");			
		}
		
		var userLines = document.getElementsByClassName('user-line');
		for(var i = 0; i < userLines.length; i++)
		{
			removeClass(userLines[i], "dark-border-bottom");			
		}
		
		var tabContents = document.getElementsByClassName('tab-content');
		for(var i = 0; i < tabContents.length; i++)
		{
			removeClass(tabContents[i], "dark-1");
			removeClass(tabContents[i], "dark-shadow");		
		}
		
		var inks = document.getElementsByClassName('ink');
		for(var i = 0; i < inks.length; i++)
		{
			removeClass(inks[i], "dark-ink");					
		}
		
		var inksSelected = document.getElementsByClassName('ink selected');
		for(var i = 0; i < inksSelected.length; i++)
		{
			removeClass(inksSelected[i], "dark-selected");					
		}
		
		var overviewDownloadCounter = document.getElementsByClassName('overview-download-counter');
		for(var i = 0; i < overviewDownloadCounter.length; i++)
		{
			removeClass(overviewDownloadCounter[i], "white-text");					
		}
		
		var userOverviewAppnames = document.getElementsByClassName('user-overview-appname');
		for(var i = 0; i < userOverviewAppnames.length; i++)
		{
			removeClass(userOverviewAppnames[i], "white-text");					
		}
		
		var overviewAppnames = document.getElementsByClassName('overview-appname');
		for(var i = 0; i < overviewAppnames.length; i++)
		{
			removeClass(overviewAppnames[i], "white-text");					
		}
		
		var overviewRight = document.getElementsByClassName('overview-right');
		for(var i = 0; i < overviewRight.length; i++)
		{
			removeClass(overviewRight[i], "white-text");					
		}
		
		var overviewLines = document.getElementsByClassName('overview-line');
		for(var i = 0; i < overviewLines.length; i++)
		{
			removeClass(overviewLines[i], "dark-border-bottom");					
		}
		
		var infosCenter = document.getElementsByClassName('infos-center');
		for(var i = 0; i < infosCenter.length; i++)
		{
			removeClass(infosCenter[i], "white-text");					
		}
		
		var tabLinks = document.getElementsByClassName('tab-links-header');
		for(var i = 0; i < tabLinks.length; i++)
		{
			removeClass(tabLinks[i], "dark-tab-header");					
		}
		
		var buttonsReset = document.getElementsByClassName('button reset');
		for(var i = 0; i < buttonsReset.length; i++)
		{
			removeClass(buttonsReset[i], "white-text");					
		}	
	}
	
	if(localStorage.getItem("darkThemeOn") != null)
	{
		if(localStorage.getItem("darkThemeOn") == "true")
		{			
			activateDarkTheme();
		}
		else
		{		
			deactivateDarkTheme();
		}
	}
	else
	{
		localStorage.setItem("darkThemeOn", "false");			
	}

	function toggleDarkTheme()
	{
		if(localStorage.getItem("darkThemeOn") != null)
		{
			if(localStorage.getItem("darkThemeOn") == "true")
			{
				localStorage.setItem("darkThemeOn", "false");
				deactivateDarkTheme();
			}
			else
			{
				localStorage.setItem("darkThemeOn", "true");
				activateDarkTheme();
			}
		}
		else
		{
			localStorage.setItem("darkThemeOn", "false");			
		}
	}
});