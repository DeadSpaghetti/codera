<?php
if(!isset($_SESSION))
{
	session_start();
}

include('helper/paths.php');
?>

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
			<?php 				
				if(isset($_SESSION['loggedIn']))
				{					
					include($path_header_logout); 
				}
				else
				{				
					include($path_header); 
				}

			$UUID = $_GET['UUID'];

			global $projectArray;
			include "helper/getProjectsFromJSON.php";
			for($i=0; $i < sizeof($projectArray); $i++)
			{
				if($projectArray[$i]->{'UUID'} == $UUID)
				{
					$currentProject = $projectArray[$i];
					break;
				}
			}

			if(isset($currentProject))
			{
				$projectName = $currentProject->{'name'};
				$icon = $currentProject->{'icon'};
				$latestChanges = $currentProject->{'latestChanges'};
				$versionCode = $currentProject->{'versionCode'};
				$versionName = $currentProject->{'versionName'};
				$date = $currentProject->{'date'};
				$requirements = $currentProject->{'requirements'};
				$description = $currentProject->{'description'};
				$license = $currentProject->{'license'};
			}
			else
			{
				exit;
			}
			?>
			<div id="content">	
				<div id="white">
					<table id="app">
						<tr>
							<td id="app-icon" style="background-image: url('../images/icons/<?php echo $icon ?>');">	</td>
							<td id="app-name"><?php echo $projectName?></td>
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
								<?php echo $versionName ?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php echo $date?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php echo $latestChanges?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">description</i> <span class="icon-text">Description:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php echo $description?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php echo $requirements ?>
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
								<?php echo $license?>
							</td>
						</tr>
						
					</table>		
				</div>		
			</div>
		</div>
		<?php include("templates/footer.php"); ?>
	</body>
</html>