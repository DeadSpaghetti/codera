<?php
header ('Content-type: text/html; charset=utf-8');
if(!isset($_SESSION))
{
	session_start();
}
include('helper/paths.php');
?>

<!-- Begin Cookie Consent plugin by Silktide - http://silktide.com/cookieconsent -->
	<script>
		window.cookieconsent_options = {"message":"This website uses cookies to ensure you get the best experience.","dismiss":"Got it!","learnMore":"More info","link":"<?php echo $path_about; ?>#privacy","theme":"dark-bottom"};
	</script>

	<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/1.0.9/cookieconsent.min.js"></script>
<!-- End Cookie Consent plugin -->