<?php
  class PersonenController {
    public function login() {
    	$validation_error = "";
    	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    $this->postLogin();

		}
		else {			
		  	require_once('app/views/personen/login.php');
		}
    }

    public function postLogin() {
    	$validation_error = "";
    	if(isset($_POST['vorname']) && $_POST["vorname"] != "" && isset($_POST['name']) && isset($_POST['passwort']))
    	{
        	require('app/models/person.php');
    		$vorname = $_POST['vorname'];
    		$name = $_POST['name'];
    		$passwort = $_POST['passwort'];
    		$person = Person::login($vorname, $name, $passwort);
    		if($person == null) {
    			$validation_error .= "Die Login Daten sind inkorrekt";
    			require_once('app/views/personen/login.php');
    		}
    	}
    	else {
    		$validation_error .= "Es müssen alle Felder ausgefüllt sein";
    		require_once('app/views/personen/login.php');
    	}
    }
  }
?>