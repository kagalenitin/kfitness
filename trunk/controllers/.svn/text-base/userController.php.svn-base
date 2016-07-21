<?php

	session_start();
	
	//Include the database connection file.
	require_once("includes/connection.php");
	
	//Include the models of admin, trainer and user.
	include("models/usermodel.php");
	
	if($_REQUEST["action"] =="userlogout"){
		//Logs out user session and unsets session variables. Goes to user login page.
		session_unset();
		session_destroy();
		include("views/userlogin.php");
	}else if($_REQUEST["action"] =="edituser"){
		//Show user details from the Session variable on the edituserprofile.php
		if(isset($_SESSION["user"])){
			//echo $_SESSION['user'][1];
			include('views/edituserprofile.php');
		}else{
			echo 'You must login.';
			require_once("index.php");
		}	
	}else if ($_REQUEST["action"] == "edituserprofile"){
		//Save the user profile after it is updated.
		$objUser = new UserModel();
		if($objUser->updateUserDetails()){
			//Record updated successfully.
			header('location: index.php?c=userController&action=edituser&success=1');
		}else{
			//Something went wrong. Not updated
			header('location: index.php?c=userController&action=edituser&fail=1');
		}
	}else if($_REQUEST["action"] =="selecttrainer"){
		//Visit the selecttrainer.php, if the Session variable is set, and only if the trainer is not yet assigned.
		$objUser = new UserModel();
		if(isset($_SESSION['user'])){
			if($objUser->checkTrainerAssigned()){
				include("views/selecttrainer.php");
				//header('location: index.php?c=userController&action=selecttrainer&assign=1');
			}else{
				echo 'Your trainer is assigned!! Your trainer\'s name is '.$_SESSION['edittrainer'][0].' '.$_SESSION['edittrainer'][1];
				//header('location: index.php?c=userController&action=selecttrainer&gn=1');
			}
		}else{
			echo 'You must login.';
			require_once("index.php");
		}		
	}else if($_REQUEST["action"] == "assigntrainer"){
		//echo $_REQUEST['trainer'];
		// This will call the assignTrainer() to insert the trainer to the user.
		$objUser = new UserModel();
		if($objUser->assignTrainer()){
			echo 'Trainer was successfully assigned.';
			//header('location: index.php?c=userController&action=selecttrainer&val=1');
		}else{
		//	header('location: index.php?c=userController&action=selecttrainer&fail=1');
			echo 'Something was wrong. Trainer was not assigned.';
		}
		//echo $_REQUEST["trainer"];
	}else if($_REQUEST["action"] == "reportsession"){
		// This will take to the reportsession.php
		if(isset($_SESSION['user'])){
			include("views/reportsession.php");
		}else{
			echo 'You must login.';
			require_once("index.php");
		}
	}
?>