<?php
	class KundenController {
		public function registrieren() {
			$validation_error = "";
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    	$this->postKunde();
			}
			else{
				$orte = $this->getOrte();
				require_once('app/views/kunden/registrieren.php');
			}
		}

		public function getOrte(){
			$orte = [];
			$db = Db::getInstance();

			$sql = 'SELECT `Id`, `Bezeichnung` FROM `Ort`';

			$sth = $db->prepare($sql);
			$sth->execute();

			$result = $sth->fetchAll();

			$i = 0;
			foreach($result as $row){
    			$orte[$i] = $row;
    			$i++;
			}
			
			return $orte;
		}

		public function postKunde(){
			$validation_error = "";
			require_once('app/models/ort.php');
	    	if(	isset($_POST['vorname']) && $_POST["vorname"] != "" && 
	    		isset($_POST['name']) && $_POST["name"] != "" && 
	    		isset($_POST['email']) && $_POST["email"] != "" &&
	    		isset($_POST['passwort1']) && $_POST["passwort1"] != "" &&
	    		isset($_POST['passwort2']) && $_POST["passwort2"] != "" &&
	    		isset($_POST['strasse']) && $_POST["strasse"] != "" &&
	    		isset($_POST['hausnummer']) && $_POST["hausnummer"] != "" &&
	    		isset($_POST['geburtsdatum']) && $_POST["geburtsdatum"] != "" &&
	    		isset($_POST['ort']) && $_POST["ort"] != "" &&
	    		isset($_POST['kundennummer']) && $_POST["kundennummer"] != "" )
	    	{
	    		require_once('app/models/person.php');
	        	require_once('app/models/kunde.php');

	    		$vorname = $_POST['vorname'];
	    		$name = $_POST['name'];
	    		$email = $_POST['email'];
	    		$passwort1 = $_POST['passwort1'];
	    		$passwort2 = $_POST['passwort2'];
	    		$strasse = $_POST['strasse'];
	    		$hausnummer = $_POST['hausnummer'];
	    		$geburtsdatum = $_POST['geburtsdatum'];
	    		$ortId = $_POST['ort'];
	    		$kundennummer = $_POST['kundennummer'];
	    		$führerscheindatum = $_POST['führerscheindatum'];

	    		if ($passwort1 == $passwort2) {
	    			if (!Person::checkEmailExists($email)) {
	    				if (is_int(intval($kundennummer))) {
	    					if (!Kunde::checkKundennummerExists($kundennummer)) {
	    						if ($this->validateDate($geburtsdatum)) {
	    							if ($führerscheindatum != "") {
	    								if (validateDate($führerscheindatum)) {
	    									Kunde::createKunde($name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort1, $ortId, $email, $kundennummer, $führerscheindatum);
	    								}
	    								else{
	    									$validation_error .= "Das eingegebene Führerscheinsdatum ist ungültig.";
	    									$orte = Ort::getOrte();
	    									require_once('app/views/kunden/registrieren.php');
	    								}
	    							}
	    							else{
	    								Kunde::createKunde($name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort1, $ortId, $email, $kundennummer, $führerscheindatum);
	    							}	
	    						}
	    						else{
	    							$validation_error .= "Das eingegebene Geburtsdatum ist ungültig.";
	    							$orte = Ort::getOrte();
	    							require_once('app/views/kunden/registrieren.php');
	    						}					
	    					}
	    					else{
	    						$validation_error .= "Diese Kundennummer wird bereits benutzt! Bitte wählen Sie eine Andere.";
	    						$orte = Ort::getOrte();
	    						require_once('app/views/kunden/registrieren.php');
	    					}
	    				}
	    				else{
	    					$validation_error .= "Die Kundennummer hat ein ungültiges Format! Bitte geben Sie eine Zahl ein.";
	    					$orte = Ort::getOrte();
	    					require_once('app/views/kunden/registrieren.php');
	    				}
	    			}
	    			else{
	    				$validation_error .= "Diese Email-Adresse wird bereits benutzt! Bitte wählen Sie eine Andere.";
	    				$orte = Ort::getOrte();
	    				require_once('app/views/kunden/registrieren.php');
	    			}		    		    			
	    		}
	    		else{
	    			$validation_error .= "Die Passwörter stimmen nicht überein!";
	    			$orte = Oer::getOrte();
	    			require_once('app/views/kunden/registrieren.php');	    			
	    		}
	    	}
	    	else {
	    		$validation_error .= "Es müssen alle Felder mit Stern ausgefüllt sein";
	    		$orte = Ort::getOrte();
	    		require_once('app/views/kunden/registrieren.php');
	    	}
		}

		public function validateDate($date)
		{
		    $d = DateTime::createFromFormat('Y-m-d', $date);
		    return $d && $d->format('Y-m-d') === $date;
		}
	}
?>