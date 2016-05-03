<?php
if(!isset($_SESSION))
{
	session_start();
}
$developerName = "";
$colorScheme = "";
include('helper/paths.php');
include('helper/getGeneralSettingsFromJSON.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<?php include('cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-buttons.css"/>	
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
        <link href="../js/libs/chosen/chosen.css" rel="stylesheet" type="text/css"/>
        <link href="../js/libs/lightbox2/dist/css/lightbox.min.css" rel="stylesheet" type="text/css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/libs/chosen/chosen.jquery.min.js"></script>
        <script src="../js/template.js"></script>
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

			//check if user is allowed to see this
			$forbiddenProjects = [];
			include "helper/getForbiddenProjects.php";
			if(!empty($forbiddenProjects))
			{
				for ($i = 0; $i < sizeof($forbiddenProjects); $i++)
				{
					if ($forbiddenProjects[$i] == $UUID)
					{
						header('HTTP/ 403 Forbidden');
						echo '<div id="forbidden">FORBIDDEN 403</div>';
						exit;
					}
				}
			}

			$projectArray = [];
			include "helper/getProjectsFromJSON.php";
			if(!empty($projectArray))
			{
				for ($i = 0; $i < sizeof($projectArray); $i++)
				{
					if ($projectArray[$i]->{'UUID'} == $UUID)
					{
						$currentProject = $projectArray[$i];
						break;
					}
				}

				if (isset($currentProject))
				{
					$url = $currentProject->{'url'};
					if (isset($url) && $url != "" && $url != null)
					{
						header("Location: " . $url);
						exit;
					}
					else
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
						$screenshots = json_decode($currentProject->{'screenshots'});
						$executables = json_decode($currentProject->{'files'});
					}
				}
				else
				{
					exit;
				}
			}
			?>
			<div id="content">	
				<div id="white">
					<table id="app">
						<tr>
							<td id="app-icon" style="background-image: url('../images/icons/<?php if(isset($icon)) echo $icon ?>');">	</td>
							<td id="app-name"><?php if(isset($projectName)) echo $projectName;?></td>
						</tr>
					</table>
					<div class="line"></div>			
					<table class="infos">
						<?php
						if(isset($versionName) && $versionName != "")
						{
							echo <<<'VERSION_NAME'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">update</i> <span class="icon-text">Version:</span>
								</div>
							</td>										
							<td class="infos-right">
VERSION_NAME;
						echo $versionName;
						echo <<<'VERSION_NAME'
		</td>
						</tr>
VERSION_NAME;
						}
						if(isset($date) && $date != "")
						{
							echo <<<'DATE'
							<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
								</div>
							</td>
							<td class="infos-right">
DATE;
							echo $date;

							echo <<<'DATE'
</td>
						</tr>
DATE;
						}

						if(isset($latestChanges) && $latestChanges != "")
						{
							echo <<<'LATEST_CHANGES'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
LATEST_CHANGES;
							echo $latestChanges;
							echo <<<'LATEST_CHANGES'
							</td>
						</tr>
LATEST_CHANGES;
						}

						if(isset($description) && $description != "")
						{
							echo <<<'DESCRIPTION'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">description</i> <span class="icon-text">Description:</span>
								</div>
							</td>										
							<td class="infos-right">
DESCRIPTION;
							echo $description;
							echo <<<'DESCRIPTION'
</td>
						</tr>
DESCRIPTION;
						}

						if(isset($requirements) && $requirements != "")
						{
							echo <<<'REQUIREMENTS'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
REQUIREMENTS;
							echo $requirements;
							echo <<<'REQUIREMENTS'
</td>
						</tr>
REQUIREMENTS;
						}

						include_once "helper/functions.php";
						if(isset($executables) && !empty($executables))
						{
							echo <<<'FILE'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
								</div>
							</td>
							<td class="infos-right">
								<table id="template-download">
									<tr>
										<td>
											<select id="template-fileSelector" class="chosen-select">
FILE;
							$property = "files";
							$options = "option";
							include 'helper/printAllAvailableOptions.php';


							echo <<<'FILE'
	</select>
										</td>
										<td id="template-download-right">										
											<a class="button download" id="button-download" href="javascript:void(null)">									
												<i class="material-icons">file_download</i> <span class="button-text">Download</span> 									
											</a>
										</td>
									</tr>
								</table>
							</td>
						</tr>
FILE;
						}
						if(isset($screenshots) && !empty($screenshots))
						{

							echo <<<'SCREENSHOTS'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
								</div>
							</td>										
							<td class="infos-right.wrap">
								<!-- Tabelle Previews -->
SCREENSHOTS;

							$property = "screenshots";
							$options = "image";
							include "helper/printAllAvailableOptions.php";

							echo <<<'SCREENSHOTS'
							</td>
						</tr>
SCREENSHOTS;
						}

						if(isset($license) && $license != "")
						{
							echo <<<'LICENSE'
<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
								</div>
							</td>										
							<td class="infos-right">
LICENSE;
							echo '<a class="link-visible" id="licenseLink" href="../licenses/' . $license . '">' . $license . '</a>';

							echo <<<'LICENSE'

							</td>
						</tr>	
LICENSE;
						}

						?>

					</table>		
				</div>		
			</div>
			 <div id="templateUUID" class="hidden"><?php if(isset($UUID)) echo $UUID;?></div>
			<script src="../js/libs/lightbox2/dist/js/lightbox.min.js"></script>
		</div>      
		<?php include("templates/footer.php");?>
	</body>
</html>