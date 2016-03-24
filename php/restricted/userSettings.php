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

$username = "New User";
$accountType = "user";
$forbiddenProjects = "";

global $developerName;
include('../helper/getGeneralSettingsFromJSON.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$username = $_POST['username'];
	global $userArray;
	include "../helper/getUsersFromJSON.php";

	for($i=0; $i < sizeof($userArray); $i++)
	{
		if($userArray[$i]->{'username'} == $username)
		{
			$accountType = $userArray[$i]->{'accountType'};
			$forbiddenProjects = $userArray[$i]->{'forbiddenProjects'};
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $developerName;?> on Codera</title>
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
		<script src="../../js/userSettings.js"></script>

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
							<div id="new-project"><?php echo $username?>
							</div>
							<div class="line line-no-space"></div>
						</td>	
					</tr>					
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">mode_edit</i> <span class="icon-text">Name:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="userSettings-input-userName" type="text" maxlength="30" value="<?php if($_SERVER['REQUEST_METHOD'] == "POST") echo $userName;?>" placeholder="User"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">lock</i> <span class="icon-text">Password:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="userSettings-input-userPassword" type="password" maxlength="30" placeholder="*******"/>
						</td>
					</tr>
					<tr class="infos-row">
						<td class="infos-left lesspadding">
							<div class="icon">
								<i class="material-icons">security</i> <span class="icon-text">Is Admin:</span>
							</div>
						</td>					
						<td class="infos-right lesspadding">
							<div class="toggle-container-user">							
								<label class="switch-light switch-candy" onclick="">
									<input type="checkbox" id="toggle-user-is-admin">
									<span>
										<span>No</span>
										<span>Yes</span>
										<a style="background-color: <?php echo $colorScheme;?>"></a>
									</span>
								</label>								
							</div>
						</td>						
					</tr>	
					<tr<tr class="infos-row">
						<td colspan="2">
							<div class="user-line"> </div>
						</td>
					</tr>
					
					<tr class="infos-row">
						<td colspan="2" class="infos-center">
							<div class="user-headline-container">
								<div class="user-headline">Project Access Forbidden</div>
							</div>
						</td>	
					</tr>
					<?php
					global $projectArray;
					include "../helper/getProjectsFromJSON.php";
					for($i=0; $i < sizeof($projectArray); $i++)
					{
						$projectName = $projectArray[$i]->{'name'};
						$UUID = $projectArray[$i]->{'UUID'};
						echo '<tr class="infos-row">' .
							'<td class="infos-left">' .
							'<div class="user-project-name">' .
							$projectName.
							'</div>' .
							'</td>                                                ' .
							'<td class="infos-right">' .
							'	<div class="toggle-container-user">	' .
							'		<label class="switch-light switch-candy" onclick="">' .
							'			<input name="userSettingsProjectCheckBoxes" type="checkbox" id="userSettings_'.$UUID.'">' .
							'			<span>' .
							'				<span>No</span>' .
							'				<span>Yes</span>' .
							'				<a style="background-color:';
						echo $colorScheme;
						echo '"></a>' .
							'			</span>' .
							'</label>' .
							'</div>' .
							'</td>' .
							'</tr>';
					}
					?>

					
					<tr class="infos-row">															
						<td colspan="2" class="infos-center">
							<a class="button save" id="userSettings-button-save" href="javascript:void(null)">									
								<i class="material-icons">check</i> <span class="button-text">Save</span>
							</a>
							<a class="button discard" id="userSettings-button-discard" href="javascript:void(null)">									
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