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
		let header = document.getElementById('header');
		addClass(header, "dark-4");

		let footer = document.getElementById('footer');
		addClass(footer, "dark-4");

		let main = document.getElementById('main');
		addClass(main, "dark-2");

		let content = document.getElementById('content');
		addClass(content, "dark-2");

		let white = document.getElementById('white');
		addClass(white, "dark-1");	
		addClass(white, "dark-shadow");

		let loginWhite = document.getElementById('login-white');
		addClass(loginWhite, "dark-1");
		addClass(loginWhite, "dark-shadow");

		let loginTitle = document.getElementById('login-title');
		addClass(loginTitle, "white-text");

		let appName = document.getElementById('app-name');
		addClass(appName, "white-text");

		let aboutHeadline = document.getElementById('about-headline');
		addClass(aboutHeadline, "white-text");

		let buttonDownload = document.getElementById('button-download');
		addClass(buttonDownload, "normal-text");

		let newUser = document.getElementById('new-project');
		addClass(newUser, "white-text");

		let newProject = document.getElementById('new-user');
		addClass(newUser, "white-text");

		let buttonSave = document.getElementById('button-save');
		addClass(buttonSave, "normal-text");

		let buttonDiscard = document.getElementById('button-discard');
		addClass(buttonDiscard, "normal-text");

		let buttonSaveAbout = document.getElementById('button-save-about');
		addClass(buttonSaveAbout, "normal-text");

		let buttonDiscardAbout = document.getElementById('button-discard-about');
		addClass(buttonDiscardAbout, "normal-text");

		let userSettingsButtonSave = document.getElementById('userSettings-button-save');
		addClass(userSettingsButtonSave, "normal-text");

		let userSettingsButtonDiscard = document.getElementById('userSettings-button-discard');
		addClass(userSettingsButtonDiscard, "normal-text");

		let buttonNewUser = document.getElementById('button-new-user');
		addClass(buttonNewUser, "white-text");

		let buttonNewProject = document.getElementById('button-new-project');
		addClass(buttonNewProject, "white-text");

		let iconNames = document.getElementsByClassName('icon-name');
		for (let i = 0; i < iconNames.length; i++)
		{
			addClass(iconNames[i], "white-text");
		}

		let lines = document.getElementsByClassName('line');
		for (let i = 0; i < lines.length; i++)
		{
			addClass(lines[i], "dark-line");
		}
		
		let aboutLines = document.getElementsByClassName('about-line');
		for (let i = 0; i < aboutLines.length; i++)
		{
			addClass(aboutLines[i], "dark-line");
		}

		let aboutHeadlinesSmall = document.getElementsByClassName('about-headline-small');
		for (let i = 0; i < aboutHeadlinesSmall.length; i++)
		{
			addClass(aboutHeadlinesSmall[i], "white-text");
		}

		let aboutRight = document.getElementsByClassName('about-right');
		for (let i = 0; i < aboutRight.length; i++)
		{
			addClass(aboutRight[i], "white-text");
		}

		let aboutText = document.getElementsByClassName('about-text');
		for (let i = 0; i < aboutText.length; i++)
		{
			addClass(aboutText[i], "white-text");
		}

		let aboutTextFull = document.getElementsByClassName('about-text-full');
		for (let i = 0; i < aboutTextFull.length; i++)
		{
			addClass(aboutTextFull[i], "white-text");
		}

		let icons = document.getElementsByClassName('icon');
		for (let i = 0; i < icons.length; i++)
		{
			addClass(icons[i], "white-text");
		}

		let infosRight = document.getElementsByClassName('infos-right');
		for (let i = 0; i < infosRight.length; i++)
		{
			addClass(infosRight[i], "white-text");
		}

		let userHeadlines = document.getElementsByClassName('user-headline');
		for (let i = 0; i < userHeadlines.length; i++)
		{
			addClass(userHeadlines[i], "white-text");
			addClass(userHeadlines[i], "dark-border-bottom");
		}

		let userProjectNames = document.getElementsByClassName('user-project-name');
		for (let i = 0; i < userProjectNames.length; i++)
		{
			addClass(userProjectNames[i], "white-text");			
		}

		let userLines = document.getElementsByClassName('user-line');
		for (let i = 0; i < userLines.length; i++)
		{
			addClass(userLines[i], "dark-border-bottom");			
		}

		let tabContents = document.getElementsByClassName('tab-content');
		for (let i = 0; i < tabContents.length; i++)
		{
			addClass(tabContents[i], "dark-1");
			addClass(tabContents[i], "dark-shadow");		
		}

		let inks = document.getElementsByClassName('ink');
		for (let i = 0; i < inks.length; i++)
		{
			addClass(inks[i], "dark-ink");					
		}

		let inksSelected = document.getElementsByClassName('ink selected');
		for (let i = 0; i < inksSelected.length; i++)
		{
			addClass(inksSelected[i], "dark-selected");					
		}

		let overviewDownloadCounter = document.getElementsByClassName('overview-download-counter');
		for (let i = 0; i < overviewDownloadCounter.length; i++)
		{
			addClass(overviewDownloadCounter[i], "white-text");					
		}

		let userOverviewAppnames = document.getElementsByClassName('user-overview-appname');
		for (let i = 0; i < userOverviewAppnames.length; i++)
		{
			addClass(userOverviewAppnames[i], "white-text");					
		}

		let overviewAppnames = document.getElementsByClassName('overview-appname');
		for (let i = 0; i < overviewAppnames.length; i++)
		{
			addClass(overviewAppnames[i], "white-text");					
		}

		let overviewRight = document.getElementsByClassName('overview-right');
		for (let i = 0; i < overviewRight.length; i++)
		{
			addClass(overviewRight[i], "white-text");					
		}

		let overviewLines = document.getElementsByClassName('overview-line');
		for (let i = 0; i < overviewLines.length; i++)
		{
			addClass(overviewLines[i], "dark-border-bottom");					
		}

		let infosCenter = document.getElementsByClassName('infos-center');
		for (let i = 0; i < infosCenter.length; i++)
		{
			addClass(infosCenter[i], "white-text");					
		}

		let tabLinks = document.getElementsByClassName('tab-links-header');
		for (let i = 0; i < tabLinks.length; i++)
		{
			addClass(tabLinks[i], "dark-tab-header");					
		}

		let buttonsReset = document.getElementsByClassName('button reset');
		for (let i = 0; i < buttonsReset.length; i++)
		{
			addClass(buttonsReset[i], "white-text");					
		}	
	}
	
	function deactivateDarkTheme()
	{
		let header = document.getElementById('header');
		removeClass(header, "dark-4");

		let footer = document.getElementById('footer');
		removeClass(footer, "dark-4");

		let main = document.getElementById('main');
		removeClass(main, "dark-2");

		let content = document.getElementById('content');
		removeClass(content, "dark-2");

		let white = document.getElementById('white');
		removeClass(white, "dark-1");	
		removeClass(white, "dark-shadow");

		let loginWhite = document.getElementById('login-white');
		removeClass(loginWhite, "dark-1");
		removeClass(loginWhite, "dark-shadow");

		let loginTitle = document.getElementById('login-title');
		removeClass(loginTitle, "white-text");

		let appName = document.getElementById('app-name');
		removeClass(appName, "white-text");

		let aboutHeadline = document.getElementById('about-headline');
		removeClass(aboutHeadline, "white-text");

		let buttonDownload = document.getElementById('button-download');
		removeClass(buttonDownload, "normal-text");

		let newUser = document.getElementById('new-project');
		removeClass(newUser, "white-text");

		let newProject = document.getElementById('new-user');
		removeClass(newProject, "white-text");

		let buttonSave = document.getElementById('button-save');
		removeClass(buttonSave, "normal-text");

		let buttonDiscard = document.getElementById('button-discard');
		removeClass(buttonDiscard, "normal-text");

		let buttonSaveAbout = document.getElementById('button-save-about');
		removeClass(buttonSaveAbout, "normal-text");

		let buttonDiscardAbout = document.getElementById('button-discard-about');
		removeClass(buttonDiscardAbout, "normal-text");

		let userSettingsButtonSave = document.getElementById('userSettings-button-save');
		removeClass(userSettingsButtonSave, "normal-text");

		let userSettingsButtonDiscard = document.getElementById('userSettings-button-discard');
		removeClass(userSettingsButtonDiscard, "normal-text");

		let buttonNewUser = document.getElementById('button-new-user');
		removeClass(buttonNewUser, "white-text");

		let buttonNewProject = document.getElementById('button-new-project');
		removeClass(buttonNewProject, "white-text");

		let iconNames = document.getElementsByClassName('icon-name');
		for (let i = 0; i < iconNames.length; i++)
		{
			removeClass(iconNames[i], "white-text");
		}

		let lines = document.getElementsByClassName('line');
		for (let i = 0; i < lines.length; i++)
		{
			removeClass(lines[i], "dark-line");
		}

		let aboutLines = document.getElementsByClassName('about-line');
		for (let i = 0; i < aboutLines.length; i++)
		{
			removeClass(aboutLines[i], "dark-line");
		}

		let aboutHeadlinesSmall = document.getElementsByClassName('about-headline-small');
		for (let i = 0; i < aboutHeadlinesSmall.length; i++)
		{
			removeClass(aboutHeadlinesSmall[i], "white-text");
		}

		let aboutRight = document.getElementsByClassName('about-right');
		for (let i = 0; i < aboutRight.length; i++)
		{
			removeClass(aboutRight[i], "white-text");
		}

		let aboutText = document.getElementsByClassName('about-text');
		for (let i = 0; i < aboutText.length; i++)
		{
			removeClass(aboutText[i], "white-text");
		}

		let aboutTextFull = document.getElementsByClassName('about-text-full');
		for (let i = 0; i < aboutTextFull.length; i++)
		{
			removeClass(aboutTextFull[i], "white-text");
		}

		let icons = document.getElementsByClassName('icon');
		for (let i = 0; i < icons.length; i++)
		{
			removeClass(icons[i], "white-text");
		}

		let infosRight = document.getElementsByClassName('infos-right');
		for (let i = 0; i < infosRight.length; i++)
		{
			removeClass(infosRight[i], "white-text");
		}

		let userHeadlines = document.getElementsByClassName('user-headline');
		for (let i = 0; i < userHeadlines.length; i++)
		{
			removeClass(userHeadlines[i], "white-text");
			removeClass(userHeadlines[i], "dark-border-bottom");
		}

		let userProjectNames = document.getElementsByClassName('user-project-name');
		for (let i = 0; i < userProjectNames.length; i++)
		{
			removeClass(userProjectNames[i], "white-text");			
		}

		let userLines = document.getElementsByClassName('user-line');
		for (let i = 0; i < userLines.length; i++)
		{
			removeClass(userLines[i], "dark-border-bottom");			
		}

		let tabContents = document.getElementsByClassName('tab-content');
		for (let i = 0; i < tabContents.length; i++)
		{
			removeClass(tabContents[i], "dark-1");
			removeClass(tabContents[i], "dark-shadow");		
		}

		let inks = document.getElementsByClassName('ink');
		for (let i = 0; i < inks.length; i++)
		{
			removeClass(inks[i], "dark-ink");					
		}

		let inksSelected = document.getElementsByClassName('ink selected');
		for (let i = 0; i < inksSelected.length; i++)
		{
			removeClass(inksSelected[i], "dark-selected");					
		}

		let overviewDownloadCounter = document.getElementsByClassName('overview-download-counter');
		for (let i = 0; i < overviewDownloadCounter.length; i++)
		{
			removeClass(overviewDownloadCounter[i], "white-text");					
		}

		let userOverviewAppnames = document.getElementsByClassName('user-overview-appname');
		for (let i = 0; i < userOverviewAppnames.length; i++)
		{
			removeClass(userOverviewAppnames[i], "white-text");					
		}

		let overviewAppnames = document.getElementsByClassName('overview-appname');
		for (let i = 0; i < overviewAppnames.length; i++)
		{
			removeClass(overviewAppnames[i], "white-text");					
		}

		let overviewRight = document.getElementsByClassName('overview-right');
		for (let i = 0; i < overviewRight.length; i++)
		{
			removeClass(overviewRight[i], "white-text");					
		}

		let overviewLines = document.getElementsByClassName('overview-line');
		for (let i = 0; i < overviewLines.length; i++)
		{
			removeClass(overviewLines[i], "dark-border-bottom");					
		}

		let infosCenter = document.getElementsByClassName('infos-center');
		for (let i = 0; i < infosCenter.length; i++)
		{
			removeClass(infosCenter[i], "white-text");					
		}

		let tabLinks = document.getElementsByClassName('tab-links-header');
		for (let i = 0; i < tabLinks.length; i++)
		{
			removeClass(tabLinks[i], "dark-tab-header");					
		}

		let buttonsReset = document.getElementsByClassName('button reset');
		for (let i = 0; i < buttonsReset.length; i++)
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