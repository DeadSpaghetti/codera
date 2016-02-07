<!DOCTYPE html>

<html>
	<head>
		<title>Deadlocker</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-admin.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <script src="../js/projectSettings.js"></script>
	</head>
	<body>
		<div id="main">						
			<?php include ("header.php"); ?>
			<div id="content">	
				<div id="white">
					<table id="app">
						<tr>							
							<td id="app-title">New Project</td>	
						</tr>
					</table>
					<div class="line"></div>			
					<table id="infos">
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">mode_edit</i> <span class="infos-icon-text">Name:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input id="input-appName" type="text" maxlength="15" placeholder="MyApp"/>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">image</i> <span class="infos-icon-text">Icon:</span>
								</div>
							</td>										
							<td class="infos-right">
								 <input id="input-icon" name="Icon" type="file" accept="image/png, image/jpeg"/>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">update</i> <span class="infos-icon-text">Versioncode:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input id="input-versionCode" type="text" maxlength="15" placeholder="10"/>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">update</i> <span class="infos-icon-text">Version:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input id="input-versionName" type="text" maxlength="15" placeholder="1.0.0 b"/>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons md-light">access_time</i> <span class="infos-icon-text">Last Update:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input id="input-date" type="date"/>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">code</i> <span class="infos-icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
								<textarea id="input-changes" rows="10"> </textarea>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">description</i> <span class="infos-icon-text">Description:</span>
								</div>
							</td>										
							<td class="infos-right">
								<textarea id="input-description" rows="10"> </textarea>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="infos-icon">
									<i class="material-icons">list</i> <span class="infos-icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
								<textarea id="input-requirements" rows="10"> </textarea>
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
											<a class="button" id="button-download" href="javascript:void(null)">									
												<i class="material-icons">file_download</i> <span class="button-text">Download</span> 									
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
								<input id="input-license" name="License" type="file" accept="text/plain"> </input>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">	</td>										
							<td class="infos-right">
								<a class="button" id="button-save" href="javascript:void(null)">									
									<i class="material-icons">check</i> <span class="button-text">Save</span>
								</a>
								<a class="button" id="button-discard" href="javascript:void(null)">									
									<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
								</a>
							</td>
						</tr>						
					</table>		
				</div>		
			</div>
		</div>
		<?php include ("footer.php"); ?>		
	</body>
</html>