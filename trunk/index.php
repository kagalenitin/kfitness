<?php
	
	$c= ($_REQUEST["c"]=="") ? "defaultController" : $_REQUEST["c"];	
	//echo $c;
	
	if($c == ""){
		$c == "defaultController";
	}
	if($c == "defaultController"){
		//echo $c;
		$_REQUEST["action"]="home";
		require_once("controllers/defaultController.php");
		
	}else if($c == "homeController"){
		//Home Controller
		require_once("controllers/homeController.php");
		
	}else if($c == "userController"){
		//User Controller.
		require_once("controllers/userController.php");
	}else if($c =="trainerController"){
		//Trainer Controller.
		require_once("controllers/trainerController.php");
	}
?>