<?php

	session_start();
	
	//Include the database connection file.
	require_once("includes/connection.php");
	
	include("models/usermodel.php");
	
	if($_REQUEST["action"] == "listusers"){
		if(isset($_SESSION['trainer'])){
			include("views/listusers.php");
			
		}else{
			echo 'You must login.';
			require_once("index.php");
		}
	}else if($_REQUEST["action"] == "userdata"){
		//This is an AJAX Request to get the user detail from the database.
		$objUser = new UserModel();
		//echo $_REQUEST["data"];
		$objUser->getUserDetails();
	}
	
?>