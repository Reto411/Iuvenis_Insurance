<?php
	class Person {
		public $id;
		public $name;
		public $vorname;
		public $strasse;
		public $hausnummer;
		public $geburtsdatum;
		public $passwort;
		public $ortId;
		public $email;

		public function __construct($id, $name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $ortId, $email)
		{
			$this->id = $id;
			$this->name = $name;
			$this->vorname = $vorname;
			$this->strasse = $strasse;
			$this->hausnummer = $hausnummer;
			$this->geburtsdatum = $geburtsdatum;
			$this->passwort = $passwort;
			$this->ortId = $ortId;
			$this->email = $email;
		}

		public static function login($email, $passwort)
		{
			$db = Db::getInstance();

			//PersonId von gerade erstellten Person holen
			$sql = 'SELECT * FROM person WHERE email = :email';

			$std = $db->prepare($sql);

			$std->bindParam(':email', $email, PDO::PARAM_STR);

			$std->execute();

			$row = $std->fetch();

			$passworthash = $row['Passwort'];


	    	if($passworthash != null) {
    			// verify password
    			if(password_verify($passwort, $passworthash))
    			{  				
	    			return new Person( $row['Id'], $row['Name'], $row['Vorname'], $row['Strasse'], $row['Hausnummer'], $row['Geburtsdatum'], $row['Passwort'], $row['OrtId'], $row['Email']);
    			}
	    	}
		}

		public function checkEmailExists($email){
			$db = Db::getInstance();

			$sql = 'SELECT count(*) FROM `Person` WHERE email = :email';

			$sts = $db->prepare($sql);

			$sts->bindParam(':email', $email, PDO::PARAM_STR);

			$sts->execute();

			$number_of_rows = $sts->fetchColumn();

			if ($number_of_rows < 1) {
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
		public function getRolle($id){
			$db = Db::getInstance();

			$sql = 'SELECT count(*) FROM `Kunde` WHERE personid = :personid';

			$sts = $db->prepare($sql);

			$sts->bindParam(':personid', $id, PDO::PARAM_STR);

			$sts->execute();

			$number_of_rows = $sts->fetchColumn();

			if ($number_of_rows < 1) {
				return 'Mitarbeiter';
			}
			else{
				return 'Kunde';
			}
		}
	}
?>