<?php 
	class Db {
		private static $instance = NULL;
		
		private function __construct() {}
		
		private function __clone() {}

		public static function getInstance() {
			if(!isset(self::$instance)) {
				// create db connection
				$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
				self::$instance = new PDO('odbc:MYSQLSERVER', root, '', $pdo_options);
			}
			return self::$instance;
		}
	}

?>