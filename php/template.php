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
			<div id="header">
				<div id="login">
					   <a href="index.php"> <i class="material-icons">exit_to_app</i> <span id="login-text">Login</span></a>
				</div>	
				<div style="clear: both;"></div>					
			</div>
			<div id="name">
				<div id="name-text">
					<a href="index.php">Deadlocker</a>
				</div>			
			</div>
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
								<div class="infos-icon">
									<i class="material-icons">update</i> <span class="infos-icon-text">Version:</span>
								</div>
							</td>										
							<td class="infos-right">
								4.4.0
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons md-light">access_time</i> <span class="infos-icon-text">Last Update:</span>
								</div>
							</td>										
							<td class="infos-right">
								05.02.16
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">code</i> <span class="infos-icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
								-added functionality x
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">description</i> <span class="infos-icon-text">Description:</span>
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
								<div class="infos-icon">
									<i class="material-icons">list</i> <span class="infos-icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
								Windows 8.1<br>
								Java 1.8.0 or higher
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">file_download</i> <span class="infos-icon-text">Files:</span>
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
											<a id="button-download" href="javascript:void(null)">									
												<i class="material-icons">file_download</i> <span id="button-download-text">Download</span> 									
											</a>
										</td>
									</tr>
								</table
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">photo_camera</i> <span class="infos-icon-text">Screenshots:</span>
								</div>
							</td>										
							<td class="infos-right">
								<!-- Tabelle Previews -->
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons md-light">assignment</i> <span class="infos-icon-text">License:</span>
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
		<div id="footer">
			<div id="footer-text">
				&copy; Deadlocker <?php echo date("Y");?>
			</div>		
		</div>
	</body>
</html>