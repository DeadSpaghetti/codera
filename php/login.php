<?php
if(!isset($_SESSION))
{
	session_start();
}
include_once "helper/functions.php";
if(isset($_SESSION['loggedIn']))
{
    if(isUserAdmin($_SESSION['loggedIn']))
    {
        header('Location: restricted/admin.php');
    }
    else
    {
        header('Location: index.php');
    }

	exit;
}
$developerName = "";
$colorScheme = "";
include('helper/getGeneralSettingsFromJSON.php');
?>

<!DOCTYPE html>

<html>
	<head>
		<?php include('cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF-8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main-minified.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<script src="../js/login.js"></script>
		<script src="../js/darkTheme.js"></script>
	</head>
	<body>
		<div id="main">			
			<div id="content">	
				<div id="login-white">
					<div id="login-container">
						<div id="login-title">Login</div>
						<input class="input" id="input-username" type="text" maxlength="128" placeholder="Username"/>
						<input class="input" id="input-password" type="password" placeholder="Password"/>		
						<table id="login-table">
							<tr>
							<!-- only show when error START -->
								<td id="login-message">
									<div class="icon" id="icon-warn">
										<i class="material-icons">warning</i> <span class="icon-text">Wrong Credentials!</span>
									</div>
								</td>
							<!-- END -->
								<td id="login-button-container">
									<a class="button login" id="button-login" href="javascript:void(null)">									
										<i class="material-icons">exit_to_app</i> <span class="button-text">Login</span>
									</a>
								</td>
							</tr>
						</table>
					</div>
				</div>		
			</div>
		</div>
		<?php include("templates/footer.php"); ?>
	</body>
</html>