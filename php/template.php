<?php
if(!isset($_SESSION))
{
	session_start();
}
$developerName = "";
$colorScheme = "";
include('helper/paths.php');
include('helper/getGeneralSettingsFromJSON.php');	

include('cookie.php');
?>

<!DOCTYPE html>

<html>
	<head>
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
							<td id="app-icon" style="background-image: url('../images/icons/<?php echo $icon ?>');">	</td>
							<td id="app-name"><?php if(isset($projectName)) echo $projectName?></td>

						</tr>
					</table>
					<div class="line"></div>			
					<table class="infos">
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">update</i> <span class="icon-text">Version:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($versionName)) echo $versionName;?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($date))echo $date;?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($latestChanges)) echo $latestChanges;?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">description</i> <span class="icon-text">Description:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($description)) echo $description;?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($requirements)) echo $requirements;?>
							</td>
						</tr>
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
                                                <?php
                                                    $property = "files";
                                                    $options = "option";
                                                    include 'helper/printAllAvailableOptions.php';
												?>
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
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">photo_camera</i> <span class="icon-text">Screenshots:</span>
								</div>
							</td>										
							<td class="infos-right.wrap">
								<!-- Tabelle Previews -->
                                <?php
                                    $property = "screenshots";
                                    $options = "image";
                                    include "helper/printAllAvailableOptions.php";
                                ?>
							</td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons md-light">assignment</i> <span class="icon-text">License:</span>
								</div>
							</td>										
							<td class="infos-right">
								<?php if(isset($license)) echo'<a class="link-visible" id="licenseLink" href="../licenses/'.$license.'">'.$license.'</a>';?>
							</td>
						</tr>						
					</table>		
				</div>		
			</div>
			 <div id="templateUUID" class="hidden"><?php if(isset($UUID)) echo $UUID;?></div>
			<script src="../js/libs/lightbox2/dist/js/lightbox.min.js"></script>
		</div>      
		<?php include("templates/footer.php");?>
	</body>
</html>