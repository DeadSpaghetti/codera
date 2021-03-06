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
$forbiddenProjects = [];

$developerName = "";
$colorScheme = "";
include('../helper/getGeneralSettingsFromJSON.php');

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$username = $_POST['username'];
	//if you try to edit the admin user, without being admin yourself the page is gonna just stop loading
	if($username == "admin" && $_SESSION['loggedIn'] != "admin")
	{
		header("Location: admin.php");
		exit;
	}
	$userArray = [];
	include "../helper/getUsersFromJSON.php";

	if(!empty($userArray))
	{
		for ($i = 0; $i < sizeof($userArray); $i++)
		{
			if ($userArray[$i]->{'username'} == $username)
			{
				$accountType = $userArray[$i]->{'accountType'};
				$forbiddenProjects = json_decode($userArray[$i]->{'forbiddenProjects'});
			}
		}
	}
}
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
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main-minified.css"/>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../../js/userSettings.js"></script>
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
							<td colspan="2" class="infos-center">							
								<div id="new-user"><?php if(isset($username)) echo $username;?></div>
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

							echo <<<'USERNAME'
" placeholder="User"/></td>
						</tr>
USERNAME;
						}

						if($username != "public")
						{
							echo <<<'PASSWORD'
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">lock</i> <span class="icon-text">Password:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input class="input project" id="userSettings-input-userPassword" type="password" placeholder="*******"/>
							</td>
						</tr>
						
PASSWORD;
							echo <<<'PASSWORD_CONFIRM'
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">lock</i> <span class="icon-text">Confirm Password:</span>
								</div>
							</td>										
							<td class="infos-right">
								<input class="input project" id="userSettings-input-userPassword_confirm" type="password" placeholder="*******"/>
							</td>
						</tr>
						<tr class="infos-row">	
							<td colspan="2" class="infos-center lesspadding" id="userSettings-message">
								<div class="icon" id="icon-warn3">
									<i class="material-icons">warning</i> <span class="icon-text" id="userSettings-message-text"></span>
								</div>
							</td>
						</tr>
						
PASSWORD_CONFIRM;
						}
						else
						{
							echo '<div id="userSettings-message"><span class="icon-text" id="userSettings-message-text"></span></div>';
						}

						$projectArray = [];
						include "../helper/getProjectsFromJSON.php";


						if($username != "admin" && $username != "public")
						{
							echo <<<'ISADMIN'
						<tr class="infos-row">
							<td class="infos-left">
								<div class="icon">
									<i class="material-icons">security</i> <span class="icon-text">Is Admin:</span>
								</div>
							</td>					
							<td class="infos-right">
								<div class="toggle-container-user">							
									<label class="switch-light switch-candy" onclick="">
										<input type="checkbox" id="toggle-user-is-admin" 
ISADMIN;
							if($accountType != "admin")
								echo "checked";
							echo <<<'ISADMINREST'
								>
ISADMINREST;



							echo <<<'SWITCH'
											<span>
											<span>Yes</span>
											<span>No</span>
											<a style="background-color: 
SWITCH;
							if(isset($colorScheme)) echo $colorScheme;
							echo <<<'REST'
								"></a>
										</span>
									</label>								
								</div>
							</td>						
						</tr>							
						<tr class="infos-row">
							<td colspan="2">
								<div class="user-line"> </div>
							</td>
						</tr>
						
REST;
										
						}
						if($username != "admin" && !empty($projectArray))
						{
							echo <<<'PROJECT_ACCESS'
						<tr class="infos-row">
							<td colspan="2" class="infos-center">
								<div class="user-headline-container">
									<div class="user-headline">Project Access</div>
								</div>
							</td>	
						</tr>
PROJECT_ACCESS;
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
							

								if(!empty($forbiddenProjects) && !empty($UUID))
								{
									for ($j = 0; $j < sizeof($forbiddenProjects); $j++)
									{
										if ($forbiddenProjects[$j] == $UUID)
										{
											echo "checked";
											break;
										}
									}
								}
									echo '>' .
										'			<span>' .
										'				<span>Yes</span>' .
										'				<span>No</span>' .
										'				<a style="background-color:';

									if(isset($colorScheme)) echo $colorScheme;
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
		</div>
		<?php include("../templates/footer.php"); ?>
	<script>function getLoggedInUser()
		{
			return '<?php echo $_SESSION['loggedIn'];?>';
		}</script>
	</body>
</html>