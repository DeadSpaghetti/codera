<?php
$developerName = "";
$colorScheme = "";
include(realpath(dirname(__FILE__) . '/../helper/paths.php'));
include($path_helper_getGeneralSettings);
?>

<div id="header">	
	<div class="login left">
		<a href="javascript:void(null)" id="toggle-dark-theme"> <i class="material-icons">brightness_medium</i> <span class="login-text">Toggle Dark Mode</span></a>
	</div>
	<div class="login">
		<a href="<?php echo $path_logout;?>" id="logout-link"> <i class="material-icons">lock</i> <span class="login-text">Logout</span></a>
	</div>
	<?php
	if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != "public")
	{
		echo <<<'ACCOUNT'
<div class="login">
		<a href="
ACCOUNT;
		echo $path_account;
		echo <<<'ACCOUNT'
" id="account-link"> <i class="material-icons">account_circle</i> <span class="login-text">Account</span></a>
	</div>
ACCOUNT;


	}
	?>

	<?php
	include_once realpath(dirname(__FILE__) . '/../helper/functions.php');
	if(isUserAdmin($_SESSION['loggedIn']))
	{
		echo '<div class="login">' .
			'<a href="'. $path_admin .'" id="settings-link"> <i class="material-icons">settings</i> <span class="login-text">Settings</span></a>' .
			'</div>';
	}
	?>
	<div style="clear: both;"></div>

</div>
<div id="name" style="background-color: <?php if(isset($colorScheme)) echo $colorScheme;?>;">
	<div class="name-text" id="name-text-<?php if(strlen($developerName) <= 10){echo "short";} else if(strlen($developerName) <= 20) {echo "middle";} else{ echo "long";} ?>">
		<a href="<?php echo $path_index;?>"  <?php if(strtolower($colorScheme) == "#fff176"){ echo 'style="color: #212121;"';}?>><?php if(isset($developerName)) echo $developerName; ?></a>
	</div>			
</div>