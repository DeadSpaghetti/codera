<?php
include('../helper/getGeneralSettingsFromJSON.php');
?>

<div id="header">
	<div id="login">
		<a href="../logout.php" id="logout-link"> <i class="material-icons">lock</i> <span id="login-text">Logout</span></a>
	</div>	
	<div style="clear: both;"></div>					
</div>
<div id="name" style="background-color: <?php echo $colorScheme;?>;">
	<div id="name-text">
		<a href="../index.php"><?php echo $developerName; ?></a>
	</div>			
</div>