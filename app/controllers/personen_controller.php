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
    	if(isset($_POST['email']) && $_POST["email"] != "" && isset($_POST['passwort']) && $_POST['passwort'] != "")
    	{
        	require('app/models/person.php');
    		$email = $_POST['email'];
    		$passwort = $_POST['passwort'];

            if (Person::checkEmailExists($email)) {
                $person = Person::login($email, $passwort);
                if($person == null) {
                    $validation_error .= "Die Login Daten sind inkorrekt....";
                    require_once('app/views/personen/login.php');
                }
                else{
                    $_SESSION['person'] = serialize($person);
                    $_SESSION['rolle'] = Person::getRolle($person->id);
                    $page = $_SERVER['PHP_SELF'];
                    header("Refresh: 0; url=$page");
                }
            }
    		else{
                $validation_error .= "Die Login Daten sind inkorrekt..";
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