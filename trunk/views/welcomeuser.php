<?php
	session_start();
	if(!isset($_SESSION['user'])){
		//This will check if the user session is set or no. if not, it will send to homepage.
		header('location: index.php?c=defaultController');
	}else{
	
		echo '
		<html>
		<head>
		<title> Welcome';?> <?php echo $_SESSION["user"][1]. " " .$_SESSION["user"][2]; ?> <?php echo '</title>
		</head>
		<body topmargin="150" leftmargin="100" marginheight="70" marginwidth="130">

			<div align="left">
				Welcome ';?> <?php echo $_SESSION["user"][1]. " " .$_SESSION["user"][2]; ?>
			<?php echo ',
			</div>
			<div align="center">
				<a href="index.php?c=userController&action=selecttrainer" target="myspot">Select Trainer</a> | 
				<a href="index.php?c=userController&action=reportsession" target="myspot">Report Training Session</a> | 
				<a href="index.php?c=userController&action=viewreport" target="myspot">View Report</a> |
				<a href="index.php?c=userController&action=edituser" target="myspot">Edit Profile</a> | 
				<a href="index.php?c=userController&action=userlogout">Logout</a>
			</div>	
			<div align="center">	
				<iframe name="myspot" width="75%" height="350" frameborder=0>
					Sorry, your browser doesn\'t support iframes.
				</iframe>
			</div>
			
		</body>
		</html>';
	}
?>