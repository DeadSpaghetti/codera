<!DOCTYPE html>
<?php

if(!isset($_SESSION))
{
	session_start();
}
require '../helper/checkLogin.php';
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;	
}

$username =  $_SESSION['loggedIn'];

include('../helper/paths.php');
?>
<html>
	<head>
		<title>spaghettic0der on Codera</title>
		<meta charset="UTF_8"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
        <link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>		
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-buttons.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-toggle-buttons.css"/>
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
				<table id="infos-small">
					<tr class="infos-row">
						<td colspan="2" class="infos-center">							
							<div id="new-user"><?php echo $username?>
							</div>
							<div class="line line-no-space"></div>
						</td>	
					</tr>					
					<?php			

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
		<?php include("../templates/footer.php"); ?>
	</body>
</html>