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
		<link href="../../js/plugins/chosen/chosen.min.css" rel="stylesheet" type="text/css">
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
							<div id="new-project"><?php echo $projectName?>
								<div class="hidden" id="projectSettingsUUID">
									<?php if(isset($UUID))
											echo $UUID?>
								</div>
							</div>
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
							<input class="input project" id="input-appName" type="text" maxlength="30" value="<?php echo $selectedProject->{'name'} ?>" placeholder="MyApp"/>
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
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">update</i> <span class="icon-text">Versioncode:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-versionCode" type="text" maxlength="15" value="<?php echo $selectedProject->{'versionCode'} ?>" placeholder="10"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">update</i> <span class="icon-text">Version:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-versionName" type="text" maxlength="15" value="<?php echo $selectedProject->{'versionName'} ?>" placeholder="1.0.0 b"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons md-light">access_time</i> <span class="icon-text">Last Update:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="input-date" value="<?php echo $date ?>" type="date"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">code</i> <span class="icon-text">Latest Changes:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-changes" rows="10"><?php echo $latestChanges ?></textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">description</i> <span class="icon-text">Description:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-description" rows="10"> <?php echo $selectedProject->{'description'} ?></textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">list</i> <span class="icon-text">Requirements:</span>
							</div>
						</td>										
						<td class="infos-right">
							<textarea id="input-requirements" rows="10"><?php echo $requirements ?> </textarea>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">file_download</i> <span class="icon-text">Files:</span>
							</div>
						</td>										
						<td class="infos-right">
							<select id="projectSettings-fileSelector" multiple class="chosen-select">
								<?php
								$directory = "../../executables/";
                                $exclude = getSelectedOptions("files",$UUID);   //is array
								include "../helper/printAllFilesFromDirectoryAsOption.php";
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
							<select id="projectSettings-screenshotSelector" multiple class="chosen-select">
								<?php
								$directory = "../../images/screenshots";
                                $object = 'screenshots';
                                $exclude = getSelectedOptions($object,$UUID);   //array
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
							<select id="projectSettings-licenseSelector">
								<?php
								$directory = "../../licenses/";
                                $object = 'license';
                                $exclude = getSelectedOption($object,$UUID);
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