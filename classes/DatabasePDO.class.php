<?php
	class DatabasePDO extends PDO {
		//champs
		private static $myPDO = NULL;
		
		//fonctions
		public function __construct(){	//web08 pae6eiv
			$DB_HOST = 'localhost';
			$DB_NAME = 'web08';
			$DB_USER = 'root';
			$DB_PWD = 'root';
		}
		
		
		
		public static function getCurrentObject(){
			if (is_null(self::$myPDO)){		//Si on a pas de objet sql
				try{ 
					$myPDO = new PDO('mysql:host=localhost;dbname=web08;charset=utf8', 'root', 'root');
				} 
				catch(Exception $e){ 
					die('Error while connecting to MySQL.');
				}
			}
			return $myPDO;
		}
	}
?>

