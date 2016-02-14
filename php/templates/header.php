<?php
include('helper/getGeneralSettingsFromJSON.php');
?>

<div id="header">
	<div id="login">
		<a href="login.php"> <i class="material-icons">exit_to_app</i> <span id="login-text">Login</span></a>
	</div>	
	<div style="clear: both;"></div>					
</div>
<div id="name" style="background-color: <?php echo $colorScheme;?>;">
	<div class="name-text" id="name-text-<?php if(strlen($developerName) <= 10){echo "short";} else if(strlen($developerName) <= 20) {echo "middle";} else{ echo "long";} ?>">
		<a href="index.php"><?php echo $developerName; ?></a>
	</div>			
</div>