<!DOCTYPE html>
<?php
session_start();
if(!isset($_SESSION['loggedIn']))
{
    header('Location: ../login.php');
    exit;	
}
?>

<html>
	<head>
		<title>Deadlocker</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-template.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-admin.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-tabs.css"/>
		<link type="text/css" rel="stylesheet" href="../../css/stylesheet-colorChooser.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>        
		<script src="../../js/admin.js"></script>
		<script src="../../js/helper/colorConverter.js"></script>
		<script src="../../js/generalSettings.js"></script>
	</head>
	<body>
		<div id="main">						
			<?php include("../templates/header-logout.php"); ?>
			<div id="content">	
				<div class="tabs">
					<ul class="tab-links">						
						<li class="active"><a href="#tab1">General Settings</a></li>		
						<li><a href="#tab2">Projects</a></li> 							
						<li><a href="#tab3">Change Login</a></li> 						
					</ul>
					<div style="clear: both;"> </div> 		
						<div class="tab-content">
							<div id="tab1" class="tab active">
								<?php include("generalSettings.php"); ?>
							</div>					 
							<div id="tab2" class="tab">
								Projects	
							</div> 
							<div id="tab3" class="tab">
								<?php include("changeLogin.php"); ?>	
							</div>  							
						</div>
					</div>					
				</div>				
		</div>
		<?php include("../templates/footer.php"); ?>
	</body>
</html>