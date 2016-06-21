<?php
  class PagesController {
    public function index() {

		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    session_destroy();
		    $page = $_SERVER['PHP_SELF'];
			header("Refresh: 0; url=$page");
		}
		else {					  	
		  	require_once('app/views/pages/home.php');
		}  
    }

    public function error() {
      require_once('app/views/pages/error.php');
    }
  }
?>