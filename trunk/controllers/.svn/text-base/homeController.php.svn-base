<?php

	session_start();
	
	//Include the database connection file.
	require_once("includes/connection.php");
	
	//Include the models of admin, trainer and user.
	include("models/adminmodel.php");
	include("models/trainermodel.php");
	include("models/usermodel.php");
	//include("functions/function.php");
	//Controller logic from here.
	if($_REQUEST["action"] == "welcome"){
		//User registration !
		//include "views/userregistration.php";
	}else if($_REQUEST["action"] == "admin"){
		//Admin login !!
		$objAdmin = new AdminModel();
		if($objAdmin->loginAdmin()){
			//echo 'Success';
			include('views/welcomeadmin.php');
		}else{
			//echo 'No Success';
			header('location: index.php?c=homeController&action=adminlogin&val=1');
		}
	}else if($_REQUEST["action"] == "createtrainer"){
		// Create a new trainer.
		$objTrainer = new TrainerModel();
		if($objTrainer->insertTrainer()){
			//If insertion successful, redirect to the newtrainer.php and set val=1 as success msg.
			header('location: index.php?c=homeController&action=newtrainer&val=1');
		}else{
			//If insertion fails, redirect stating a failure msg.
			header('location: index.php?c=homeController&action=newtrainer&fail=1');
		}
	}else if($_REQUEST["action"] == "tlogin" ){
	
		//Trainer login post !
		$objTrainer= new TrainerModel();
		if($objTrainer->loginTrainer()){
			include('views/welcometrainer.php');
		}else{
			//echo "No records found.";
			header('location: index.php?c=homeController&action=trainerlogin&val=1');
		}
	}else if($_REQUEST["action"] == "ulogin") {
		//User login
		$objUser = new UserModel();
		if($objUser->loginUser()){
			include('views/welcomeuser.php');
		}else{
			//echo "No records found.";
			header('location: index.php?c=homeController&action=userlogin&val=1');
		}
	}else if($_REQUEST["action"] =="createuser"){
		// Create a new user account.
		$objUser = new UserModel();
		if($objUser->insertUser()){
			//If insertion successful, redirect to newuser.php and set val=1 as success msg. 
			header('location: index.php?c=homeController&action=newuser&val=1');
		}else{
			// If unsuccessful, redirect with failure msg.
			header('location: index.php?c=homeController&action=newuser&fail=1');
		}
		
	}else if($_REQUEST["action"] == "userlogin"){
		//If its a user login. redirect him to userlogin.php
		include ("views/userlogin.php");
	}else if($_REQUEST["action"] == "trainerlogin"){
		//Redirect to trainerlogin page
		include ("views/trainerlogin.php");
	}else if($_REQUEST["action"] == "adminlogin"){
		//Redirect to admin login page
		include ("views/homepage.php");
	}else if($_REQUEST["action"] == "newtrainer"){
		//Redirect to newtrainer page.
		include ("views/newtrainer.php");
	}else if($_REQUEST["action"] == "newuser"){
		//Redirect to the new user page.
		include("views/newuser.php");
	}else if($_REQUEST["action"] == "adminlogout"){
		//Admin logs out of the system. Goes to admin login page.
		include("views/homepage.php");
	}else if($_REQUEST["action"] == "trainerlogout"){
		//Logs out trainer session and unsets the session variables. Goes to trainer login page.
		session_unset(); //echo $_SESSION['trainer'][1]. 'is firstname';
		session_destroy();
		include("views/trainerlogin.php");
	}else if($_REQUEST["action"] == "ajaxrequest"){
		//AJAX Request to check if username exists in User Model
		$objTrainer= new TrainerModel();
		$objTrainer->checkUsernameExists();
	}else if($_REQUEST["action"] == "ajaxuser"){
		$objUser = new UserModel();
		$objUser->checkEMailExists();
		
	}
?>