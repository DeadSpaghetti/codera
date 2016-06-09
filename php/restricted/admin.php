<!DOCTYPE html>
<?php
if(!isset($_SESSION['loggedIn']))
	session_start();
include_once "../helper/functions.php";
if(!isUserAdmin($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;
}
$developerName = "";
$colorScheme = "";
include('../helper/convertHexToRGB.php');
include('../helper/getGeneralSettingsFromJSON.php');				
?>

<html>
	<head>
		<?php include('../cookie.php'); ?>
		<title><?php if(isset($developerName)) echo $developerName;?> on Codera</title>
		<meta charset="UTF-8"/>		
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>					
		<link rel="stylesheet" type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<link rel="stylesheet" type="text/css" href="../../js/libs/elFinder/css/elfinder.min.css">
		<link rel="stylesheet" type="text/css" href="../../js/libs/elFinder/css/theme.css">
		<link type="text/css" rel="stylesheet" href="../../js/libs/select2/css/select2.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>     
		<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>		
		<script src="../../js/admin.js"></script>
		<script src="../../js/helper/colorConverter.js"></script>
		<script src="../../js/generalSettings.js"></script>
		<script src="../../js/projectOverview.js"></script>
		<script src="../../js/mediaOverview.js"></script>
		<script src="../../js/userOverview.js"></script>
		<script src="../../js/resetOverview.js"></script>	
		<script src="../../js/libs/select2/js/select2.min.js"></script>	
		<script src="../../js/aboutOverview.js"></script>
		<script src="../../js/libs/elFinder/js/elfinder.min.js"></script>	
		<script src="../../js/darkTheme.js"></script>			
	</head>
	<body>
		<div id="main">						
			<?php include("../templates/header-logout-back.php"); ?>
			<div id="content">	
				<div class="tabs">
					<ul class="tab-links">						
						<li class="tab-links-header" id="tabGeneralSettings-list-element" class="active"><a href="#tabGeneralSettings" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">General Settings</a></li>
						<li class="tab-links-header" id="tabProjectOverview-list-element"><a href="#tabProjectOverview" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Projects</a></li>					
						<li class="tab-links-header" id="tabMedia-list-element"><a href="#tabMedia" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Media</a></li>
						<li class="tab-links-header" id="tabUsers-list-element"><a href="#tabUsers" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Users</a></li>
						<li class="tab-links-header" id="tabAbout-list-element"><a href="#tabAbout" style="background-color: rgba(<?php convertHexToRGB($colorScheme);?>, 0.7);">Aboutpage</a></li>
					<?php if($_SESSION['loggedIn'] == "admin"){ echo '<li class="tab-links-header" id="tabReset-list-element"><a href="#tabReset" style="background-color: rgba('; echo convertHexToRGB($colorScheme).', 0.7);">Reset</a></li>';}?>
					</ul>							
					<div class="tab-content">
						<div id="tabGeneralSettings" class="tab active">
							<?php include("generalSettings.php"); ?>
						</div>		 
						<div id="tabProjectOverview" class="tab">
							<?php include("projectOverview.php"); ?>
						</div> 							
						<div id="tabMedia" class="tab">
							<div id="elfinder"></div>
						</div>
						<div id="tabUsers" class="tab">
							<?php include("userOverview.php"); ?>	
						</div> 
						<div id="tabAbout" class="tab">
							<?php include("aboutOverview.php"); ?>	
						</div>
						<?php
						if($_SESSION['loggedIn'] == "admin")
						{
							echo '<div id="tabReset" class="tab">';
							include("resetOverview.php");
							echo '</div>';
						}
						?>
					</div>
				</div>					
			</div>				
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>

</html>