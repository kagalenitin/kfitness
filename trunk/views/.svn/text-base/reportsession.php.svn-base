<?php
	//echo 'Report Session';
	session_start();
	require_once("includes/connection.php");

	if(!isset($_SESSION['user'])){
		//This will check if the user session is set or no. if not, it will send to homepage.
		header('location: index.php?c=defaultController');
	}else{
		echo '<html>
		<head></head>
		
		<body>
			<div align="center">
				<form method="post" action="index.php" id="reportsession" name="reportsession">
					
				</form>
			</div>
		</body>
		</html>';
	}
?>