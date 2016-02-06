<!DOCTYPE html>
<html>
	<head>
		<title>Deadlocker</title>
		<meta charset="UTF_8"/>
		<link type="text/css" rel="stylesheet" href="../css/stylesheet-main.css"/>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	</head>
	<body>
		<div id="main">
			<div id="header">
				<div id="login">
					   <a href="index.php"> <i class="material-icons">exit_to_app</i> <span id="login-text">Login</span></a>
				</div>	
				<div style="clear: both;"></div>					
			</div>
			<div id="name">
				<div id="name-text">
					<a href="index.php">Deadlocker</a>
				</div>			
			</div>
			<div id="content">				
				<table id="projects">
					<tr class="row">
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/eyedropper.png');"> </div> <div class="icon-name">ColorPicker</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/BF4.png');"> </div> <div class="icon-name">BF4</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/Bejeweled.png');"> </div> <div class="icon-name">Bejeweled</div></a></td>
					</tr>
					<tr class="row">
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/tetris.png');"> </div> <div class="icon-name">Tetris</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/change.png');"> </div> <div class="icon-name">ChangeLogger</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/list.png');"> </div> <div class="icon-name">SaveMyPlaylist</div></a></td>
					</tr>
					<tr class="row">
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/2048.png');"> </div> <div class="icon-name">2048</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/uhr.png');"> </div> <div class="icon-name">SmartTime</div></a></td>
						<td class="entry"> <a href="template.php"><div class="icon" style="background-image: url('../images/icons/bullhorn.png');"> </div> <div class="icon-name">Post</div></a></td>
					</tr>
				</table>		
			</div>			
		</div>
		<div id="footer">
			<div id="footer-text">
				&copy; Deadlocker <?php echo date("Y");?>
			</div>			
		</div>
	</body>
</html>