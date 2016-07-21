<?php
	session_start();
	if(!isset($_SESSION['trainer'])){
		//This will check if the user session is set or no. if not, it will send to homepage.
		header('location: index.php?c=defaultController');
	}else{
	
		echo '
		<html>
		<head>
		<title> Welcome ';?><?php echo $_SESSION["trainer"][1]. ' ' .$_SESSION["trainer"][2]; ?><?php echo '</title>
		</head>
		<body topmargin="150" leftmargin="100" marginheight="70" marginwidth="130">

			<div align="left">
				Welcome ';?>
				<?php echo $_SESSION["trainer"][1]. " " .$_SESSION["trainer"][2]; ?>
			<?php echo'	
			</div>
			<div align="center">
				<a href="index.php?c=trainerController&action=listusers" target="myspot">List users</a> | Edit Profile | <a href="index.php?c=homeController&action=trainerlogout">Logout</a>
			</div>
			<div align="center">	
				<iframe name="myspot" width="75%" height="450" frameborder=0>
					Sorry, your browser does not support iframes.
				</iframe>
			</div>
		</body>
		</html>
		';
	}
?>