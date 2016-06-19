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
    	$db = Db::getInstance();
    	if(isset($_POST['vorname']) && isset($_POST['name']) && isset($_POST['passwort']))
    	{
    		$vorname = $_POST['vorname'];
    		$name = $_POST['name'];
    		$passwort = $_POST['passwort'];
    	}


    }
  }
?>