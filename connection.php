<?php 
	class Db {
		private static $instance = NULL;
		
		private function __construct() {}
		
		private function __clone() {}

		public static function getInstance() {
			if(!isset(self::$instance)) {
				// create db connection				
				//self::$instance = new PDO('mysql:MYSQLSERVER', 'root', '');
				self::$instance = new PDO('mysql:dbname=iuvenis_insurance_db;host=localhost;charset=utf8', 'root', '');
				self::$instance->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			return self::$instance;
		}
	}
?>