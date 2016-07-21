<html>
<head>
<title> Welcome <?php echo 'Admin'; ?> </title>
</head>

<body>
	<div align="center">
		<h2> Welcome Admin </h2>
		
		Create Account !!
		<div><b><a href="index.php?c=homeController&action=newtrainer" target="myspot">New Trainer</a> | <a href="index.php?c=homeController&action=newuser" target="myspot">New User</a> | <a href="index.php?c=homeController&action=adminlogout">Logout</a></b></div>
		<br /><br /><br />
		<iframe name="myspot" width="75%" height="350" frameborder=0>
			Sorry, your browser doesn't support iframes.
		</iframe>
	</div>
</body>
</html>