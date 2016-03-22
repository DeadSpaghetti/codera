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
$UUID = null;

function getSelectedOption($object,$UUID)
{
    if(isset($UUID))
    {
        global $projectArray;
        include "../helper/getProjectsFromJSON.php";
        for ($i = 0; $i < sizeof($projectArray); $i++)
        {
            if ($projectArray[$i]->{'UUID'} == $UUID)
            {
                return $projectArray[$i]->{$object};
            }
        }
    }
}

function getSelectedOptions($object,$UUID)
{
    if(isset($UUID))
    {
        global $projectArray;
        include "../helper/getProjectsFromJSON.php";
        for ($i = 0; $i < sizeof($projectArray); $i++)
        {
            if ($projectArray[$i]->{'UUID'} == $UUID)
            {
                return json_decode($projectArray[$i]->{$object});
            }
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    global $projectArray;
    $UUID = $_POST['UUID'];

    include "../helper/getProjectsFromJSON.php";

    for($i=0; $i < sizeof($projectArray); $i++)
    {
        if($projectArray[$i]->{'UUID'} == $UUID)
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

            break;
        }
    }
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Codera</title>
		<meta charset="UTF_8"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="../../js/libs/chosen/chosen.min.css" rel="stylesheet" type="text/css">
        <link href="../../js/libs/pickadate/lib/compressed/themes/default.css" rel="stylesheet" type="text/css">
        <link href="../../js/libs/pickadate/lib/compressed/themes/default.date.css" rel="stylesheet" type="text/css">
        <link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>		
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-buttons.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-toggle-buttons.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../../js/projectSettings.js"></script>
        <script src="../../js/libs/chosen/chosen.jquery.min.js"></script>
        <script src="../../js/libs/pickadate/lib/compressed/picker.js"></script>
        <script src="../../js/libs/pickadate/lib/compressed/picker.date.js"></script>

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
							<div id="new-project"><?php echo $projectName?>
								<div class="hidden" id="projectSettingsUUID">
									<?php if(isset($UUID))
											echo $UUID;?>
								</div>
							</div>
							<div class="line line-no-space"></div>
						</td>	
					</tr>
					<tr class="infos-row">
						<td colspan="2" class="infos-center">
							<div id="toggle-container">							
								<label class="switch-light switch-candy" onclick="">
									<input type="checkbox" id="toggle-project-or-url" <?php if($url != "")echo "checked"?>>
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
							<input class="input project" id="input-appName" type="text" maxlength="30" value="<?php echo $projectName;?>" placeholder="MyApp"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">image</i> <span class="icon-text">Icon:</span>
							</div>
						</td>										
						<td class="infos-right">
							<select id="projectSettings-iconSelector">
								<?php
								$directory = "../../images/icons/";
								$object = 'icon';
								$exclude = getSelectedOption($object,$UUID);
								include "../helper/printAllFilesFromDirectoryAsOption.php"
								?>
							</select>
						</td>
					</tr>
						<!--settings for normal project -->					
						<?php include('projectSettingsNormal.php');?>
						<!--settings for url project -->	
						<?php include('projectSettingsURL.php');?>
					</div>
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