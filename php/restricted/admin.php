<!DOCTYPE html>
<?php
session_start();
require '../helper/checkLogin.php';
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;	
}
global $developerName;
global $colorScheme;
include('../helper/convertHexToRGB.php');
include('../helper/getGeneralSettingsFromJSON.php');				
?>

<html>
	<head>
		<title><?php echo $developerName ?> on Codera</title>
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
		<script src="../../js/userOverview.js"></script>
	</head>
	<body>
		<div id="main">						
			<?php include("../templates/header-logout-back.php"); ?>
			<div id="content">	
				<div class="tabs">
					<ul class="tab-links">						
						<li id="tabGeneralSettings-list-element" class="active"><a href="#tabGeneralSettings" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">General Settings</a></li>
						<li id="tabProjectOverview-list-element"><a href="#tabProjectOverview" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Projects</a></li>
						<li id="tabChangeLogin-list-element"><a href="#tabChangeLogin" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Change Login</a></li>
						<li id="tabMedia-list-element"><a href="#tabMedia" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Media</a></li>
						<li id="tabUsers-list-element"><a href="#tabUsers" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Users</a></li>
						<li id="tabReset-list-element"><a href="#tabReset" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Reset</a></li>
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
							<div id="tabMedia" class="tab">
								<?php include("mediaOverview.php"); ?>	
							</div> 
							<div id="tabUsers" class="tab">
								<?php include("userOverview.php"); ?>	
							</div> 
							<div id="tabReset" class="tab">
								<?php include("resetOverview.php"); ?>	
							</div> 							
						</div>
					</div>					
				</div>				
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>

</html>