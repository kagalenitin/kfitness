<?php
	
	class TrainerModel{
		public function insertTrainer(){
			/* 
			* This method will insert the records of new trainer.
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$qry = "INSERT INTO trainer (firstname, lastname, username, password) values ('".$_REQUEST["firstname"]. "', '".
						$_REQUEST["lastname"]. "', '". $_REQUEST["username"]. "', '" .$_REQUEST["pass"]. "');";
				$result = mysql_query($qry);
				if(!$result){
					//echo " Sorry ! Some fields caused problems";
					$objDBConn->dbClose();
					return false;
				}else{
					//echo "Values inserted !";
					$objDBConn->dbClose();
					return true;
				}
			}else{
				//echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				return false;
			}
		}
		
		public function loginTrainer(){
			/* 
			* This method will login the trainer by validating the uname n pwd.
			*/
			$objDBConn = DBManager::getInstance();	
			if($objDBConn->dbConnect()){
				$result = mysql_query("SELECT * from trainer where username='".$_REQUEST["username"]."' and password='".$_REQUEST["pass"]."'");
				$row = mysql_fetch_array($result);
				if($row == false){
					//echo "No records";
					return false;
				}else{
					$_SESSION['trainer'] = $row;
					$objDBConn->dbClose();
					return true;
				}
			}else{
				//echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				return false;
			}
			
		}
		
		public function checkUsernameExists(){
			/*
			*	This function checks if the username exists. This is an AJAX request.
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				//echo "SELECT * from trainer where username='".$_REQUEST["username"]."'";
				$result = mysql_query("SELECT * from trainer where username='".$_REQUEST["username"]."' LIMIT 1");
				$count= mysql_num_rows($result);
				if($count==0){
					//Username is available
					$objDBConn->dbClose();
					//return true;
					echo $count;
				}else{
					//Username already taken.
					$objDBConn->dbClose();
					//return false;
					echo $count;
				}
				
			}else{
				//echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				//return false;
			}
			
		}
		
		public function loadTrainerName(){
			/*
			* Check if the trainer is available and load it in the selecttrainer.php combobox
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$query = "select trainerid, firstname, lastname from trainer";
				$result = mysql_query($query); 
			}
			$objDBConn->dbClose();
			return $result;
			
		}
	
	
	}
?>