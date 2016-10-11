<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}

include('../helper/paths.php');

$projectName = "New Project";
$versionCode = "";
$versionName = "";
$requirements = "";
$date = "";
$icon = "";
$latestChanges = "";
$description = "";
$projectStatus = "Final";
$url = "";
$starred = "false";
$UUID = null;

function getSelectedOption($object,$UUID)
{
    if(isset($UUID))
    {
		$projectArray = [];
        include "../helper/getProjectsFromJSON.php";
		if(!empty($projectArray))
		{
			for ($i = 0; $i < sizeof($projectArray); $i++)
			{
				if ($projectArray[$i]->{'UUID'} == $UUID)
				{
					return $projectArray[$i]->{$object};
				}
			}
		}
    }
}

function getSelectedOptions($object,$UUID)
{
    if(isset($UUID))
    {
		$projectArray = [];
        include "../helper/getProjectsFromJSON.php";
		if(!empty($projectArray))
		{
			for ($i = 0; $i < sizeof($projectArray); $i++)
			{
				if ($projectArray[$i]->{'UUID'} == $UUID)
				{
					return json_decode($projectArray[$i]->{$object});
				}
			}
		}
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	$projectArray = [];
    $UUID = $_POST['UUID'];
    include "../helper/getProjectsFromJSON.php";

	if(!empty($projectArray))
	{
		for ($i = 0; $i < sizeof($projectArray); $i++)
		{
			if ($projectArray[$i]->{'UUID'} == $UUID)
			{
				$selectedProject = $projectArray[$i];
				$projectName = $selectedProject->{'name'};
				$icon = $selectedProject->{'icon'};
				$latestChanges = $selectedProject->{'latestChanges'};
				$versionCode = $selectedProject->{'versionCode'};
				$versionName = $selectedProject->{'versionName'};
				$date = $selectedProject->{'date'};
				$requirements = $selectedProject->{'requirements'};
				$description = $selectedProject->{'description'};
				$projectStatus = $selectedProject->{'projectStatus'};
				$url = $selectedProject->{'url'};
				$starred = $selectedProject->{'starred'};
				break;
			}
		}
	}
}
$developerName = "";
$colorScheme = "";
include('../helper/getGeneralSettingsFromJSON.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include('../cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF-8"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
        <link href="../../js/libs/pickadate/lib/compressed/themes/default.css" rel="stylesheet" type="text/css">
        <link href="../../js/libs/pickadate/lib/compressed/themes/default.date.css" rel="stylesheet" type="text/css">
		<link type="text/css" rel="stylesheet" href="../../js/libs/select2/css/select2.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main-minified.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../../js/projectSettings.js"></script>
		<script src="../../js/libs/select2/js/select2.min.js"></script>	
        <script src="../../js/libs/pickadate/lib/compressed/picker.js"></script>
        <script src="../../js/libs/pickadate/lib/compressed/picker.date.js"></script>
		<script src="../../js/darkTheme.js"></script>
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
					<table class="infos-small">
						<tr class="infos-row">
							<td colspan="3" class="infos-center">
                                <div id="new-project">
                                    <div class="starred"><i id="star" class="material-icons"><?php
											if ($starred == "true")
                                            {
                                                echo "star";
                                            }
                                            else
                                            {
                                                echo "star_border";
                                            } ?></i></div><?php if (isset($projectName)) echo $projectName; ?>
									<div class="hidden" id="projectSettingsUUID">
										<?php
										if(isset($UUID))
											echo $UUID;
										?>
									</div>
								</div>
								<div class="line line-no-space"></div>
							</td>	
						</tr>
						<tr class="infos-row">
							<td colspan="3" class="infos-center">
								<div id="toggle-container">							
									<label class="switch-light switch-candy" onclick="">
										<input type="checkbox"
											   id="toggle-project-or-url" <?php if (isset($url) && $url != "") echo "checked"; ?>>
										<span>
											<span>Project</span>
											<span>URL</span>
											<a style="background-color: <?php echo $colorScheme;?>"></a>
										</span>
									</label>								
								</div>
							</td>						
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">mode_edit</i> <span class="icon-text">Name:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input class="input project" id="input-appName" type="text" maxlength="30" value="<?php if(isset($projectName)) echo $projectName;?>" placeholder="MyApp"/>
							</td>
							<td class="infos-right-space"></td>
						</tr>
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">image</i> <span class="icon-text">Icon:</span>
								</div>
							</td>										
							<td class="infos-right">
								<select id="projectSettings-iconSelector" style="width: 96%;">
									<option id="Select an Option" selected>Select an Option</option>
									<?php
									$directory = "../../images/icons/";
									$object = 'icon';
									$exclude = getSelectedOption($object,$UUID);
									include "../helper/printAllFilesFromDirectoryAsOption.php";
									?>
								</select>
							</td>
							<td class="infos-right-space"></td>
						</tr>
						<tr class="infos-row row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">label</i> <span class="icon-text">Status:</span>
								</div>
							</td>										
							<td class="infos-right">
								<div class="radiogroup" id="radiogroup-1">				
									<input type="radio" name="projectStatus" id="radio-1" value="Alpha" <?php if($projectStatus == "Alpha"){echo "checked";}?>/>
									<label for="radio-1">Alpha</label>
								</div>
								<div class="radiogroup">				
									<input type="radio" name="projectStatus" id="radio-2" value="Beta" <?php if($projectStatus == "Beta"){echo "checked";}?>/>
									<label for="radio-2">Beta</label>
								</div>
								<div class="radiogroup">				
									<input type="radio" name="projectStatus" id="radio-3" value="Final" <?php if($projectStatus == "Final"){echo "checked";}?>/>
									<label for="radio-3">Final</label>
								</div>			
							</td>
							<td class="infos-right-space"></td>
						</tr>	
							<!--settings for normal project -->					
							<?php include('projectSettingsNormal.php');?>
							<!--settings for url project -->	
							<?php include('projectSettingsURL.php');?>

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
							<td class="infos-right-space"></td>
						</tr>						
					</table>
				</div>
			</div>
		</div>
		<?php include("../templates/footer.php"); ?>		
	</body>
</html>