<?php 
//Connect to DB//
	include("database/definevar.php");	
	class DBManager{
		 // Store the single instance of Database 
		private static $m_pInstance; 
		public static $connect;
		private function __construct() { } 

		public static function getInstance() 
		{ 
			if (!self::$m_pInstance) 
			{ 
				self::$m_pInstance = new DBManager(); 
			} 

			return self::$m_pInstance; 
		} 
		
		//Connect to the database.
		public function dbConnect(){
		  $this->connect = mysql_connect(DB_SERVER, DB_UNAME, DB_PASS); 
			if(!$this->connect){
				die('Sorry! The database did not connect.'.mysql_error());
				return false;
			}else{
			 //Select DB	
				mysql_select_db(DB_NAME);
				//echo "Database selected.";
				return true;
			}
			
		}
		//Close the database.
		public function dbClose(){
			//echo $this->connect. 'closed. ';
			mysql_close($this->connect);
		}
		
	}	


?>
