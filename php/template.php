<!DOCTYPE html>

<html>
	<head>
		<title>Deadlocker</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-template.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<div id="main">
			<?php include("header.php"); ?>
			<div id="content">	
				<div id="white">
					<table id="app">
						<tr>
							<td id="app-icon" style="background-image: url('../images/icons/tetris.png');">	</td>
							<td id="app-name">SaveMyPlayList</td>	
						</tr>
					</table>
					<div class="line"></div>			
					<table id="infos">
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">update</i> <span class="icon-text">Version:</span>
								</div>
							</td>										
							<td class="infos-right">
								4.4.0
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
								</div>
							</td>										
							<td class="infos-right">
								05.02.16
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
								-added functionality x
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">description</i> <span class="icon-text">Description:</span>
								</div>
							</td>										
							<td class="infos-right">
								Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, 
								sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est 
								Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore 
								et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, 
								no sea takimata sanctus est Lorem ipsum dolor sit amet.
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
								Windows 8.1<br>
								Java 1.8.0 or higher
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
								</div>
							</td>										
							<td class="infos-right">	
								<table>
									<tr>
										<td>
											 <select>
												  <option value="JAR">YourApp.jar -  Any OS</option>
												  <option value="EXE">Installer.exe - Windows x68</option>
												  <option value="EXE-64">Installer.exe - Windows x64</option>								
											</select>
										</td>
										<td>
											<a class="button" id="button-download" href="javascript:void(null)">									
												<i class="material-icons">file_download</i> <span class="button-text">Download</span> 									
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
								</div>
							</td>										
							<td class="infos-right">
								<!-- Tabelle Previews -->
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
								</div>
							</td>										
							<td class="infos-right">
								Your EULA here
							</td>
						</tr>
						
					</table>		
				</div>		
			</div>
		</div>
		<?php include("footer.php"); ?>
	</body>
</html>