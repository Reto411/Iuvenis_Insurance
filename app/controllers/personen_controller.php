<?php
  class PersonenController {
    public function login() {
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    $this->postLogin();
		}
		else {
		  	require_once('app/views/personen/login.php');
		}
    }

    public function postLogin() {
    	
    }
  }
?>