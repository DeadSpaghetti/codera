<?php
if(!isset($_SESSION))
{
	session_start();
}  
if(!isset($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}

include('../helper/paths.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Codera</title>
		<meta charset="UTF_8"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>	
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>		
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-buttons.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../../js/projectSettings.js"></script>
		<script src="../../js/plugins/chosen/chosen.jquery.min.js"></script>
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
				<table id="infos-small">
					<tr class="infos-row">
						<td colspan="2" class="infos-center">							
							<div id="new-project">New Project</div>		
							<div class="line"></div>
						</td>	
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">mode_edit</i> <span class="icon-text">Name:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-appName" type="text" maxlength="30" placeholder="MyApp"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">image</i> <span class="icon-text">Icon:</span>
							</div>
						</td>										
						<td class="infos-right">
                            <select>
                                <?php
                                $directory = "../../images/icons/";
                                include "../helper/printAllFilesFromDirectoryAsOption.php"
                                ?>
                            </select>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">update</i> <span class="icon-text">Versioncode:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-versionCode" type="text" maxlength="15" placeholder="10"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">update</i> <span class="icon-text">Version:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-versionName" type="text" maxlength="15" placeholder="1.0.0 b"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-date" type="date"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-changes" rows="10"> </textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">description</i> <span class="icon-text">Description:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-description" rows="10"> </textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-requirements" rows="10"> </textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
							</div>
						</td>										
						<td class="infos-right">									
							<select>
                                <?php
                                $directory = "../../executables/";
                                include "../helper/printAllFilesFromDirectoryAsOption.php"
                                ?>
                            </select>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
							</div>
						</td>										
						<td class="infos-right">
							<select>
                                <?php
                                $directory = "../../images/screenshots/";
                                include "../helper/printAllFilesFromDirectoryAsOption.php"
                                ?>
                            </select>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
							</div>
						</td>										
						<td class="infos-right">
                            <select>
                                <?php
                                $directory = "../../licenses/";
                                include "../helper/printAllFilesFromDirectoryAsOption.php"
                                ?>
                            </select>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">	</td>										
						<td class="infos-right">
							<a class="button save" id="button-save" href="javascript:void(null)">									
								<i class="material-icons">check</i> <span class="button-text">Save</span>
							</a>
							<a class="button discard" id="button-discard" href="javascript:void(null)">									
								<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
							</a>
						</td>
					</tr>						
				</table>
			</div>
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>
</html>