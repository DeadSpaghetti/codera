<?php
if(!isset($_SESSION))
{
	session_start();
}
include('../helper/paths.php');
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
	header('Location: ../login.php');
	exit;
}

$username = "New User";
$accountType = "user";
$forbiddenProjects = array();

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
			$forbiddenProjects = json_decode($userArray[$i]->{'forbiddenProjects'});
		
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
							<div id="new-user"><?php echo $username?>
							</div>
							<div class="line line-no-space"></div>
						</td>	
					</tr>
					<?php
					if($username != "admin" && $username != "public")
					{
						echo <<<'USERNAME'
					<tr class="infos-row">
						<td class="infos-left">
							<div class="icon">
								<i class="material-icons">mode_edit</i> <span class="icon-text">Name:</span>
							</div>
						</td>										
						<td class="infos-right">
							<input class="input project" id="userSettings-input-userName" type="text" maxlength="30" value="
USERNAME;
						if ($_SERVER['REQUEST_METHOD'] == "POST")
							echo $username;

						echo <<<'REST_USERNAME'
" placeholder="User"/></td>
					</tr>
REST_USERNAME;
					}
					?>


					<?php
					if($username != "public")
					echo <<<'PASSWORD'
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
					
PASSWORD;


					if($username != "admin" && $username != "public")
					{
						echo <<<'ISADMIN'
					<tr class="infos-row">
						<td class="infos-left lesspadding">
							<div class="icon">
								<i class="material-icons">security</i> <span class="icon-text">Is Admin:</span>
							</div>
						</td>					
						<td class="infos-right lesspadding">
							<div class="toggle-container-user">							
								<label class="switch-light switch-candy" onclick="">
									<input type="checkbox" id="toggle-user-is-admin" 
ISADMIN;
						if($accountType == "admin") echo "checked";
						echo <<<'ISADMINREST'
	>
ISADMINREST;



						echo <<<'SWITCH'
<span>
										<span>No</span>
										<span>Yes</span>
										<a style="background-color: 
SWITCH;
						echo $colorScheme;
						echo <<<'REST'
	"></a>
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
					
REST;
					}
					if($username != "admin")
					{
						echo <<<'PROJECT_ACCESS'
<tr class="infos-row">
						<td colspan="2" class="infos-center">
							<div class="user-headline-container">
								<div class="user-headline">Project Access Forbidden</div>
							</div>
						</td>	
					</tr>
PROJECT_ACCESS;

					}
					if($username != "admin")
					{
					global $projectArray;
					include "../helper/getProjectsFromJSON.php";
					for ($i = 0; $i < sizeof($projectArray); $i++)
					{
						$projectName = $projectArray[$i]->{'name'};
						$UUID = $projectArray[$i]->{'UUID'};
						echo '<tr class="infos-row">' .
							'<td class="infos-left">' .
							'<div class="user-project-name">' .
							$projectName .
							'</div>' .
							'</td>                                                ' .
							'<td class="infos-right">' .
							'	<div class="toggle-container-user">	' .
							'		<label class="switch-light switch-candy" onclick="">' .
							'			<input name="userSettingsProjectCheckBoxes" type="checkbox" id="userSettings_' . $UUID . '" ';
						for ($j = 0; $j < sizeof($forbiddenProjects); $j++)
						{
							if ($forbiddenProjects[$j] == $UUID)
							{
								echo "checked";
								break;
							}
						}

						echo '>' .
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