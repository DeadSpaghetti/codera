<?php
include(realpath(dirname(__FILE__) . '/../helper/paths.php'));
include($path_helper_getGeneralSettings);
?>

<div id="header">	
	<div class="login">
		<a href="<?php echo $path_logout;?>" id="logout-link"> <i class="material-icons">lock</i> <span class="login-text">Logout</span></a>
	</div>
	<?php
	include realpath(dirname(__FILE__) . '/../helper/functions.php');
	if(isUserAdmin($_SESSION['loggedIn']))
	{

		echo '<div class="login">' .
			'<a href="<?php echo $path_admin;?>" id="settings-link"> <i class="material-icons">settings</i> <span class="login-text">Settings</span></a>' .
			'</div>';
	}
	?>
	<div style="clear: both;"></div>

</div>
<div id="name" style="background-color: <?php echo $colorScheme;?>;">
	<div class="name-text" id="name-text-<?php if(strlen($developerName) <= 10){echo "short";} else if(strlen($developerName) <= 20) {echo "middle";} else{ echo "long";} ?>">
		<a href="<?php echo $path_index;?>"><?php echo $developerName; ?></a>
	</div>			
</div>