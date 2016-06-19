<?php
	class Kunde {
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
	}
?>