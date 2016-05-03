<?php
$developerName = "";
include(realpath(dirname(__FILE__) . '/../helper/paths.php'));
include($path_helper_getGeneralSettings);
include(realpath(dirname(__FILE__) . '/../helper/convertHexToRGB.php'));
?>

<div id="header">	
	<div class="login">
		<a href="<?php echo $path_logout;?>" id="logout-link"> <i class="material-icons">lock</i> <span class="login-text">Logout</span></a>
	</div>		
	<div class="login">
		<a href="<?php echo $path_account;?>"> <i class="material-icons">account_circle</i> <span class="login-text">Account</span></a>
	</div>
	<div class="login" id="back-link">
		<a href="<?php echo $path_index;?>"> <i class="material-icons">home</i> <span class="login-text">Home</span></a>
	</div>
	<div style="clear: both;"></div>					
</div>
<div id="name" style="background-color: <?php if(isset($colorScheme)) echo $colorScheme;?>;">
	<div class="name-text" id="name-text-<?php if(strlen($developerName) <= 10){echo "short";} else if(strlen($developerName) <= 20) {echo "middle";} else{ echo "long";} ?>">
		<a href="<?php echo $path_index;?>"  <?php if(strtolower($colorScheme) == "#fff176"){ echo 'style="color: #212121;"';}?>><?php if(isset($developerName)) echo $developerName; ?></a>
	</div>			
</div>