<?php
$developerName = "";
$colorScheme = "";
include('helper/getGeneralSettingsFromJSON.php');
?>

<div id="header">
	<div class="login">
		<a href="login.php"> <i class="material-icons">exit_to_app</i> <span class="login-text">Login</span></a>
	</div>	
	<div style="clear: both;"></div>					
</div>
<div id="name" style="background-color: <?php if(isset($colorScheme)) echo $colorScheme;?>;">
	<div class="name-text" id="name-text-<?php if(strlen($developerName) <= 10){echo "short";} else if(strlen($developerName) <= 20) {echo "middle";} else{ echo "long";} ?>">
		<a href="index.php"><?php if(isset($developerName)) echo $developerName; ?></a>
	</div>			
</div>