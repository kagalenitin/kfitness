<?php
	//Include connections.php
	//include("includes/connection.php");
	
	class Utilities{
		public static function generateRandomPassword(){
			$chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
			srand((double)microtime()*1000000); 
			$i = 1; 
			$pass = '' ; 

			while ($i <= 6) { 
				$num = rand() % 33; 
				$tmp = substr($chars, $num, 1); 
				$pass = $pass . $tmp; 
				$i++; 
			} 
			//echo $pass;
			return $pass; 
		}
		
	}
	

?>