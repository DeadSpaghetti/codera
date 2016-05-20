<?php
if(!ini_get('date.timezone') )
{
	date_default_timezone_set('Europe/Berlin');
}
$developerName = "";
$path_about = "";
include(realpath(dirname(__FILE__) . '/../helper/paths.php'));
include($path_helper_getGeneralSettings);
?>
<div id="footer">	
	<table>
		<tr>
			<td> <a href="<?php if(isset($path_about)) echo $path_about;?>">About</a></td>
			<td>&copy; <?php if(isset($developerName)) echo $developerName;?> <?php echo date("Y");?></td>
			<td>
				<div id="footer-right"><a href="https://github.com/DeadSpaghetti/codera"> <img id="icon-github"
																							   src="<?php if (isset($path_footer_github_icon)) echo $path_footer_github_icon; ?>"
																							   alt=""> <span
							id="footer-right-text">codera on GitHub</span></a></div>
				<div style="clear: both;"></div>
			</td>
		</tr>
	</table>		
</div>

