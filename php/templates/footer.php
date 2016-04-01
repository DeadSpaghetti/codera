<?php
global $developerName;
include(realpath(dirname(__FILE__) . '/../helper/paths.php'));
include($path_helper_getGeneralSettings);
?>
<div id="footer">	
	<table>
		<tr>
			<td> <a href="<?php echo $path_about;?>">About</a></td>
			<td>&copy; <?php echo $developerName;?> <?php echo date("Y");?></td>
			<td> <div id="footer-right"><a href="https://github.com/spaghettic0der/codera"> <img id="icon-github" src="<?php echo $path_footer_github_icon; ?>" alt=""> <span id="footer-right-text">codera on GitHub</span></a></div><div style="clear: both;"></div> </td>
		</tr>
	</table>		
</div>

