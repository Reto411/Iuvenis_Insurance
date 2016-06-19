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

		public function __construct($id, $name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $ortId)
		{
			$this->id = $id;
			$this->name = $name;
			$this->vorname = $vorname;
			$this->strasse = $strasse;
			$this->hausnummer = $hausnummer;
			$this->passwort = $passwort;
			$this->ortId = $ortId;
		}

		public static function login($vorname, $name, $passwort)
		{
			$db = Db::getInstance();
	    	$row = $db->query('SELECT * from peron WHERE person.vorname == '. $vorname .' AND person.name == '. $name.' AND person.passwort == '.password_hash($passwort, PASSWORD_DEFAULT));
	    	if($row != null) {
	    		return new Person($row['id'], $row['vorname'], $row['strasse']. $row['hausnummer'], $row['geburtsdatum'], $row['passwort'], $row['ortId']);
	    	}
	    	return false;
		}
	}
?>