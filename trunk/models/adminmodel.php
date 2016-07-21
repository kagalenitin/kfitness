<?php
	
	class AdminModel{
		
		public function loginAdmin(){
			/*
			*	Admin Login method. Takes the username and pwd, validates in the system and returns true or false values. 
			*/
			
			$objDBConn = DBManager::getInstance();	
			if($objDBConn->dbConnect()){
				$result = mysql_query("SELECT * from admin where username='".$_REQUEST["username"]."' and password='".$_REQUEST["pass"]."'");
				$count= mysql_num_rows($result);
				if($count==0){
					return false;
				}else{
					$objDBConn->dbClose();
					return true;
				}
				
			}else{
				//echo 'Something went wrong ! ';
				$objDBConn->dbClose();
				return false;
			}
			
		}
		
		
	}
	
?>