<!DOCTYPE html>
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
$developerName = "";
$colorScheme = "";
include "../helper/getGeneralSettingsFromJSON.php";

$username = $_SESSION['loggedIn'];
include('../helper/paths.php');
?>
<html>
	<head>
		<?php include('../cookie.php');?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-buttons.css"/>		
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>			
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../../js/account.js"></script>

	</head>
	<body>
		<div id="main">
				<?php 				
					if(isset($_SESSION['loggedIn']))
					{					
						include($path_header_logout_back); 
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
								<div id="new-user"><?php if(isset($username)) echo $username;?>
								</div>
								<div class="line line-no-space"></div>
							</td>	
						</tr>					
						<?php
						include_once "../helper/functions.php";
						if(!isUserAdmin($username))
						{
							echo <<<'OLD_PASSWORD'
							<tr class="infos-row">
								<td class="infos-left">
									<div class="icon">
										<i class="material-icons">lock</i> <span class="icon-text">Old Password:</span>
									</div>
								</td>										
								<td class="infos-right">
									<input class="input project" id="account-input-old-password" type="password" placeholder="*******"/>
								</td>
							</tr>					
OLD_PASSWORD;
						}
						echo <<<'NEW_PASSWORD'
							<tr class="infos-row">
								<td class="infos-left">
									<div class="icon">
										<i class="material-icons">lock</i> <span class="icon-text">New Password:</span>
									</div>
								</td>										
								<td class="infos-right">
									<input class="input project" id="account-input-new-password" type="password" placeholder="*******"/>
								</td>
							</tr>					
NEW_PASSWORD;
						echo <<<'CONFIRM_PASSWORD'
							<tr class="infos-row">
								<td class="infos-left">
									<div class="icon">
										<i class="material-icons">lock</i> <span class="icon-text">Confirm Password:</span>
									</div>
								</td>										
								<td class="infos-right">
									<input class="input project" id="account-input-new-password_repeat" type="password" placeholder="*******"/>
								</td>
							</tr>					
CONFIRM_PASSWORD;
				
						?>					
						<tr class="infos-row">															
							<td colspan="2" class="infos-center">
								<a class="button save" id="account-button-save" href="javascript:void(null)">									
									<i class="material-icons">check</i> <span class="button-text">Save</span>
								</a>
								<a class="button discard" id="account-button-discard" href="javascript:void(null)">									
									<i class="material-icons">delete</i> <span class="button-text">Discard</span> 									
								</a>
							</td>
						</tr>						
					</table>
				</div>
			</div>
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>
</html>