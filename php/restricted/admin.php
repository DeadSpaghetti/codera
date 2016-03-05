<!DOCTYPE html>
<?php
session_start();
require '../helper/checkLogin.php';
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;	
}
?>

<html>
	<head>
		<title>Codera</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-buttons.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-tabs.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-colorChooser.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>        
		<script src="../../js/admin.js"></script>
		<script src="../../js/helper/colorConverter.js"></script>
		<script src="../../js/generalSettings.js"></script>
        <script src="../../js/changeLogin.js"></script>
		<script src="../../js/projectOverview.js"></script>
	</head>
	<body>
		<div id="main">						
			<?php include("../templates/header-logout-back.php"); ?>
			<div id="content">	
				<div class="tabs">
					<ul class="tab-links">						
						<li id="tabGeneralSettings-list-element" "class="active"><a href="#tabGeneralSettings">General Settings</a></li>
						<li id="tabProjectOverview-list-element"><a href="#tabProjectOverview">Projects</a></li>
						<li id="tabChangeLogin-list-element"><a href="#tabChangeLogin">Change Login</a></li>
					</ul>
					<div style="clear: both;"> </div> 		
						<div class="tab-content">
							<div id="tabGeneralSettings" class="tab active">
								<?php include("generalSettings.php"); ?>
							</div>					 
							<div id="tabProjectOverview" class="tab">
								<?php include("projectOverview.php"); ?>
							</div> 
							<div id="tabChangeLogin" class="tab">
								<?php include("changeLogin.php"); ?>	
							</div>  							
						</div>
					</div>					
				</div>				
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>

</html>