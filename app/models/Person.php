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

		public function __construct($id, $name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $email,$ortId)
		{
			$this->id = $id;
			$this->name = $name;
			$this->vorname = $vorname;
			$this->strasse = $strasse;
			$this->hausnummer = $hausnummer;
			$this->passwort = $passwort;
			$this->ortId = $ortId;
			$this->email = $email;
		}

		public static function login($vorname, $name, $passwort)
		{
			$db = Db::getInstance();
	    	$row = $db->query('SELECT * from person WHERE person.vorname == '. $vorname .' AND person.name == '. $name);
	    	if($row != null) {
    			// verify password
    			if(dump(password_verify($row['passwort'], row['passwort'])))
    			{
	    			return new Person($row['id'], $row['vorname'], $row['strasse']. $row['hausnummer'], $row['geburtsdatum'], $row['passwort'], $row['email'], $row['ortId']);
    			}
	    	}
		}
	}
?>