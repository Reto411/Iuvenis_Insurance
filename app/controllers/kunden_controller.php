<?php
	class KundenController {
		public function index() {
			$validation_error = "";
    		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		    	$this->postKunde();
			}
			else{
				$orte = $this->getOrte();
				require_once('app/views/kunden/index.php');
			}
		}

		public function getOrte(){
			$orte = [];
			$db = Db::getInstance();

			$sql = 'SELECT `Id`, `Bezeichnung` FROM `Ort`';

			$sth = $db->prepare($sql);
			$sth->execute();

			$result = $sth->fetchAll();

			foreach($result as $row){
    			$orte = array($row['Bezeichnung'] => $row['Id']);
			}
			
			return $orte;
		}

		public function postKunde(){
			$validation_error = "";
	    	if(	isset($_POST['vorname']) && $_POST["vorname"] != "" && 
	    		isset($_POST['name']) && $_POST["name"] != "" && 
	    		isset($_POST['email']) && $_POST["email"] != "" &&
	    		isset($_POST['strasse']) && $_POST["strasse"] != "" &&
	    		isset($_POST['hausnummer']) && $_POST["hausnummer"] != "" &&
	    		isset($_POST['geburtsdatum']) && $_POST["geburtsdatum"] != "" &&
	    		isset($_POST['ort']) && $_POST["ort"] != "" &&
	    		isset($_POST['kundennummer']) && $_POST["kundennummer"] != "" &&
	    		isset($_POST['führerscheindatum']) && $_POST["führerscheindatum"] != "")
	    	{
	    		require('app/models/person.php');
	        	require('app/models/kunde.php');

	    		$vorname = $_POST['vorname'];
	    		$name = $_POST['name'];
	    		$email = $_POST['email'];
	    		$strasse = $_POST['strasse'];
	    		$hausnummer = $_POST['hausnummer'];
	    		$geburtsdatum = $_POST['geburtsdatum'];
	    		$ortId = $_POST['ort'];
	    		$kundennummer = $_POST['kundennummer'];
	    		$führerscheindatum = $_POST['führerscheindatum'];
	    		
	    		$passwort = 12345;

	    		$kunde = Kunde::createKunde($name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $ortId, $email, $kundennummer, $führerscheindatum);
	    		echo $vorname . ' ' . $name . ' ' . $strasse . ' ' . $hausnummer . ' ' . $geburtsdatum . ' ' . $passwort . ' ' . $ortId . ' ' . $email . ' ' . $kundennummer . ' ' . $führerscheindatum;
	    	}
	    	else {
	    		$validation_error .= "Es müssen alle Felder ausgefüllt sein";
	    		$orte = $this->getOrte();
	    		require_once('app/views/kunden/index.php');
	    	}
		}
	}
?>