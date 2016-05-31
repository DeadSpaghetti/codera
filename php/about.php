<?php
if(!isset($_SESSION))
{
	session_start();
}

include('helper/paths.php');
$developerName = "";
$colorScheme = "";
include('helper/getGeneralSettingsFromJSON.php');	

$aboutText = "";
$aboutIcon = "";
include "helper/getAboutPageFromJSON.php";

?>

<!DOCTYPE html>

<html>
	<head>
		<?php include('cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-buttons.css"/>		
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/about.js"></script>
	</head>
	<body>
		<div id="main">
			<?php 				
				if(isset($_SESSION['loggedIn']))
				{					
					include($path_header_logout);
				}
				else
				{				
					include($path_header);
				}			
			?>
			<div id="content">	
				<div id="white">					
					<div id="about-headline">About</div>					
					<div class="line"></div>	
					<div class="about-headline-small"><?php if(isset($developerName)) echo $developerName;?></div>
					<table class="about-table">
						<tr class="about-row">
							<td class="about-left">
								<?php
								if (!empty($aboutIcon) && file_exists("../images/icons/" . $aboutIcon))
									echo '<div id="about-icon" style="background-image: url(' . "'" . $path_folder_icons . "/" . $aboutIcon . "')" . '"' . ";></div>";
								else
								{
									echo '<div id="about-icon"></div>';
								}
								?>

							</td>										
							<td class="about-right">
								<?php if (isset($aboutText)) echo nl2br($aboutText); ?>
							</td>
						</tr>						
					</table>
					<div class="about-line"></div>					
					<div class="about-headline-small">Codera</div>	
					<table class="about-table">
						<tr class="about-row">
							<td class="about-left">
								<div id="about-icon" style="background-image: url('<?php echo $path_folder_icons;?>/Codera-Logo-transparent.png');"></div>								
							</td>										
							<td class="about-right">
								Codera is a free and open-source multi-user content management system for developers.<br> <br>
								It was created by spaghettic0der and Deadlocker in 2016.<br> <br>
								It's main purpose is to offer a solution for developers to deploy their software on
								their own servers.
								The multi user system allows you to restrict certain projects from public access and
								only allows a few people to access them.
								In addition you are able to create additional administrators, that can maintain your
								website.
								Codera allows you to deploy executables or to link to a web services/websites you have
								created.<br> <br>
								<table>
									<tr>
										<td>Download:</td>
										<td class="link-visible-table-right"><a class="link-visible"
																				href="https://github.com/DeadSpaghetti/codera">Codera
												on Github</a></td>
									</tr>
									<tr>
										<td>Wiki & Documentation:</td>
										<td class="link-visible-table-right"><a class="link-visible"
																				href="https://github.com/DeadSpaghetti/codera/wiki">Codera
												Wiki</a></td>
									</tr>
								</table>								
							</td>
						</tr>						
					</table>
					<div class="about-line"></div>				
					<div class="about-headline-small">Libraries</div>	
					<div class="about-text">
						Codera is using the following libraries:<br> <br>								
						<table class="link-visible-table">
							<tr>
								<td>jQuery</td>
								<td class="link-version">v2.2.0</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/jquery/jquery">jQuery on Github</a></td>
							</tr>
							<tr>
								<td>jQuery UI</td>
								<td class="link-version">v1.11.4</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/jquery/jquery-ui">jQuery UI on Github</a></td>
							</tr>
							<tr>
								<td>Select2</td>
								<td class="link-version">v4.0.2</td>
								<td class="link-visible-table-right"><a class="link-visible"
																		href="https://select2.github.io/">Select2 on
										Github</a></td>
							</tr>
							<tr>
								<td>Lightbox2</td>
								<td class="link-version">v2.8.2</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/lokesh/lightbox2">LightBox2 on Github</a></td>
							</tr>
							<tr>
								<td>Pickadate</td>
								<td class="link-version">v3.5.6</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/amsul/pickadate.js/">Pickadate on GitHub</a></td>
							</tr>
							<tr>
								<td>elFinder</td>
								<td class="link-version">v2.1.9</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/Studio-42/elFinder">elFinder on GitHub</a></td>
							</tr>
							<tr>
								<td>ToggleSwitches</td>
								<td class="link-version">v4.0.2</td>
								<td class="link-visible-table-right"><a class="link-visible" href="https://github.com/ghinda/css-toggle-switch">CSS Toggle Switches on Github</a></td>
							</tr>
						</table>
					</div>
					<div class="about-line"></div>			
					<div class="about-headline-small">License</div>	
					<div class="about-text-full">
						Codera is distributed under the MIT License.
						<br><br>
						The MIT License (MIT)
						<br><br>
						Copyright (c) 2016 deadlocker8 &amp; spaghettic0der
						<br><br>
						Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:
						<br><br>
						The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
						<br><br>
						THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
					</div>
					<div class="about-line"></div>			
					<div class="about-headline-small" id="privacy">Privacy Policy</div>	
					<div class="about-text-full">
						This website uses cookies to improve the users experience while visiting the website. <br> <br>
						Cookies are small files saved to the user's computers hard drive that save and store information for later use. This allows the website, through its server to provide the users with a tailored experience within this website.
						Users are advised that if they wish to deny the use and saving of cookies from this website on to their computers hard drive they should take necessary steps within their web browsers security settings to block all cookies from this website and its external serving vendors.
						<br> <br>
						On this website cookies are used to enable php sessions especially for the login feature. <br>
						This site doesn't collect and store any personal information.
						<br> <br>
						For additional information you can visit these websites: <a class="link-visible" href="http://www.allaboutcookies.org/cookies/">www.allaboutcookies.org/cookies/</a><br>
																					<a class="link-visible" href="https://en.wikipedia.org/wiki/HTTP_cookie">en.wikipedia.org/wiki/HTTP_cookie</a>
						<br> <br> <br> <br>
					</div>
				</div>
			</div>			 
		</div>      
		<?php include("templates/footer.php"); ?>        
	</body>
</html>