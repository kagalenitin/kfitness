<?php

	include("functions/functions.php");
	include("functions/PHPMail.php");
	class UserModel{
		public function loginUser(){
			/* 
			* This method will login the user by validating the uname n pwd.
			*/
			$objDBConn = DBManager::getInstance();	
			if($objDBConn->dbConnect()){
				$result = mysql_query("SELECT * from userprofile where email='".$_REQUEST["email"]."' and password='".$_REQUEST["pass"]."'");
				$row = mysql_fetch_array($result);
				if($row == false){
					//echo "No records";
					return false;
				}else{
					$_SESSION['user'] = $row;
					$objDBConn->dbClose();
					return true;
				}
			}else{
				//echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				return false;
			}
			
		}
		
		public function insertUser(){
			/* 
			* This method will insert the records of new trainer.
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$pass = Utilities::generateRandomPassword();
				$qry = "INSERT INTO userprofile (firstname, lastname, password, dob, weight, height, biceps, chest, gender, email, phone, address, city, state, zip, medical_history) values ('".$_REQUEST["firstname"]. "', '".
						$_REQUEST["lastname"]. "', '". $pass. "', '" .$_REQUEST["dob"]. "', '" .$_REQUEST["weight"]. "', '" .$_REQUEST["height"]. "', '" .$_REQUEST["bisceps"]. "', '".$_REQUEST["chest"]. "', '".
						$_REQUEST["gender"]. "', '".$_REQUEST["email"]. "', " .$_REQUEST["phone"]. ", '".$_REQUEST["address"]."', '".$_REQUEST["city"]. "', '".$_REQUEST["state"]. "', " .$_REQUEST["zip"]. ", '".$_REQUEST["history"]."');";
				//echo $qry;		
				$result = mysql_query($qry);
				if(!$result){
					//echo " Sorry ! Some fields caused problems";
					$objDBConn->dbClose();
					return false;
				}else{
					//echo "Values inserted !";
					$email_result = PHPMail::sendEMailConfirmation($_REQUEST["email"], $pass);
					if($email_result){
						//echo "EMail was sent successfully. And customer was added successfully to the system.";
						$objDBConn->dbClose();
						return true;
					}else{
						echo "Something went wrong while sending the email.";
						$objDBConn->dbClose();
						return false;
					}
				}
			}else{
				echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				return false;
			}
		}
		
		public function checkEMailExists(){
			/*
			*	This function checks if the EMAIL exists. This is an AJAX request.
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				//echo "SELECT * from userprofile where email='".$_REQUEST["username"]."'";
				$result = mysql_query("SELECT * from userprofile where email='".$_REQUEST["email"]."' LIMIT 1");
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
		
		public function updateUserDetails(){
			/*
			* This function will update the user details. I tried to update only the fields that were changed. I will change it.
			*/
			
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$query = "UPDATE userprofile set firstname='".$_REQUEST["firstname"]. "', lastname='".$_REQUEST["lastname"]. "', password= '". $_REQUEST['pass']. "', dob= '" .$_REQUEST["dob"]. "', weight= '" .$_REQUEST["weight"]. "', height= '" .$_REQUEST["height"]. "', biceps= '" .$_REQUEST["bisceps"]. "', chest= '".$_REQUEST["chest"]. "', gender='".$_REQUEST["gender"]. "', phone=" .$_REQUEST["phone"]. ", address='".$_REQUEST["address"]."', city='".$_REQUEST["city"]. "', state= '".$_REQUEST["state"]. "', zip= " .$_REQUEST["zip"]. ", medical_history='".$_REQUEST["history"]."' where email= '".$_SESSION['user'][10]."'";
				$result = mysql_query($query);
				//$row = mysql_fetch_array($result);
				if(!$result){
					//echo 'Sorry something went wrong !';
					$objDBConn->dbClose();
					return false;
				}else{
					//Record updated and show the change on the form.
					$result1 = mysql_query("SELECT * from userprofile where email='".$_REQUEST["email"]."' and password='".$_REQUEST["pass"]."'");
					$row = mysql_fetch_array($result1);
					$_SESSION['user'] = $row;
					//echo 'The record has been updated.';
					$objDBConn->dbClose();
					return true;
				}
			}else{
				return false;
			}
		}
		
		public function assignTrainer(){
			/*
			* This function assigns the trainer to the user.
			*/
			
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$qry = "INSERT INTO trainer_user (trainerid, userid, assigned) values (".$_REQUEST['trainer'].", ".$_SESSION['user'][0].", 1);";
				//echo $qry;
				$result = mysql_query($qry);
				if(!$result){
					//echo "something was wrong!";
					$objDBConn->dbClose();
					return false;
				}else{
					//echo "Your trainer is assigned.";
					$objDBConn->dbClose();
					return true;
				}
			}
		}
		
		public function checkTrainerAssigned(){
			/*
			* This function will check if the trainer is assigned. If the trainer is assigned, then it will not load the selecttrainer.php.
			*/
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$qry = "select t.firstname, t.lastname, tu.assigned from trainer t, trainer_user tu where t.trainerid=tu.trainerid and tu.userid=".$_SESSION['user'][0].";";
				//echo $qry;
				$result = mysql_query($qry);
				$row = mysql_fetch_array($result);
				//echo $row['assigned'];
				if($row['assigned']==1){
					// Means the trainer is assinged
					//$_SESSION['edittrainer'] is a variable to change the existing trainer name.
					$_SESSION['edittrainer'] = $row;
					//echo $_SESSION['edittrainer'];
					$objDBConn->dbClose();
					return false;
				}else{
					//Means trainer is not yet assigned.
					$objDBConn->dbClose();
					return true;
				}
			}
		}
		
		public function listUsers(){
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				$query = "select u.userid as userid, u.firstname as firstname, u.lastname  as lastname from userprofile u, trainer_user t where t.userid = u.userid and t.trainerid = ". $_SESSION["trainer"][0].";";
				$result = mysql_query($query);
			}
			$objDBConn->dbClose();
			return $result;
		}
		
		
		public function getUserDetails(){
			/*
			* This is the AJAX Request from listusers.php, where the user details will be listed. 
			*/
			//echo $_REQUEST["data"];
			$objDBConn = DBManager::getInstance();
			if($objDBConn->dbConnect()){
				//echo 'SELECT firstname,lastname,dob,weight,height,biceps,chest,gender,medical_history from userprofile where userid=".$_REQUEST["data"]." LIMIT 1';
				$result = mysql_query("SELECT firstname,lastname,dob,weight,height,biceps,chest,gender,medical_history from userprofile where userid=".$_REQUEST["data"]." LIMIT 1");
				
				echo "<table border='1' cellspacing='0' cellpadding='0' >
				<tr style='background-color:gray'>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Date of Birth</th>
				<th>Weight</th>
				<th>Height</th>
				<th>Bisceps</th>
				<th>Chest</th>
				<th>Gender</th>
				<th>Medical History</th>
				</tr>";

				while($row = mysql_fetch_array($result)){
					  echo "<tr>";
					  echo "<td>" . $row['firstname'] . "</td>";
					  echo "<td>" . $row['lastname'] . "</td>";
					  echo "<td>" . $row['dob'] . "</td>";
					  echo "<td>" . $row['weight'] . "</td>";
					  echo "<td>" . $row['height'] . "</td>";
					  echo "<td>" . $row['biceps'] . "</td>";
					  echo "<td>" . $row['chest'] . "</td>";
					  echo "<td>" . $row['gender'] . "</td>";
					  echo "<td>" . $row['medical_history'] . "</td>";
					  echo "</tr>";
				}
				echo "</table>";

			}else{
				echo 'No record was found';
			}
				$objDBConn->dbClose();
		}
	}
?>