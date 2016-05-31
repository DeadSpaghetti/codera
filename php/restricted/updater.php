<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
	<meta charset="UTF-8"/>
    <link type="text/css" rel="stylesheet" href="../../css/stylesheet-main.css"/>
    <link type="text/css" rel="stylesheet" href="../../css/stylesheet-installer.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>

</head>
	<body>
		<div id="main">
			<div id="content">
				<div id="white">
					<div class="installer-head">
						Update
					</div>
					<div class="line"></div>
						<div class="installer-content">
							<span class="installer-sub-headline">Codera is updating right now!</span>
							<br> <br>
							Please wait for the update to finish.
							<br> <br>
							You will be automatically redirected once the update is done.
							<br> <br>						
						</div>					
				   </div>
			</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function () {
		location.href = "../helper/updateCodera.php";
	});
</script>