<?php 
	class Db {
		private static $instance = NULL;
		
		private function __construct() {}
		
		private function __clone() {}

		public static function getInstance() {
			if(!isset(self::$instance)) {
				// create db connection
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				
				//self::$instance = new PDO('mysql:MYSQLSERVER', 'root', '', $pdo_options);
				self::$instance = new PDO('mysql:dbname=iuvenis_insurance_db;host=localhost;charset=utf8', 'root', '', $pdo_options);
			}
			return self::$instance;
		}
	}
?>