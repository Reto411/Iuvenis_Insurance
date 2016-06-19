<?php
	class Kunde extends Person {
		public $idkunde;
		public $kundennummer;
		public $führerscheindatum;

		public function __construct($id, $name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $email, $ortId, $idkunde, $führerscheindatum, $kundennummer)
		{
			$this->id = $id;
			$this->name = $name;
			$this->vorname = $vorname;
			$this->strasse = $strasse;
			$this->hausnummer = $hausnummer;
			$this->passwort = $passwort;
			$this->ortId = $ortId;
			$this->email = $email;
			$this->idkunde = $idkunde;
			$this->kundennummer = $kundennummer;
			$this->führerscheindatum = $führerscheindatum;
		}

		public static function createKunde($name, $vorname, $strasse, $hausnummer, $geburtsdatum, $passwort, $ortId, $email, $pkundennummer, $pführerscheindatum){

			$db = Db::getInstance();

			//Insert into Person Tabelle:
			$sql = 'INSERT INTO `person` ( `Name`, `Vorname`, `Strasse`, `Hausnummer`, `Geburtsdatum`, `OrtId`, `Passwort`, `Email`) 
					VALUES ( :name, :vorname, :strasse, :hausnummer, :geburtsdatum, :ortid, :passwort, :email)';

			$stmt = $db->prepare($sql);

			$stmt->bindParam(':name', $name, PDO::PARAM_STR);
			$stmt->bindParam(':vorname', $vorname, PDO::PARAM_STR);
			$stmt->bindParam(':strasse', $strasse, PDO::PARAM_STR);
			$stmt->bindParam(':hausnummer', $hausnummer, PDO::PARAM_STR);
			$stmt->bindParam(':geburtsdatum', $geburtsdatum, PDO::PARAM_STR);
			$stmt->bindParam(':ortid', $ortId, PDO::PARAM_STR);
			$stmt->bindParam(':passwort', $passwort, PDO::PARAM_STR);
			$stmt->bindParam(':email', $email, PDO::PARAM_STR);

			$stmt->execute();

			//PersonId von gerade erstellten Person holen
			$sql = 'SELECT id FROM person WHERE email = :email';

			$std = $db->prepare($sql);

			$std->bindParam('email', $email, PDO::PARAM_STR);

			$std->execute();

			$row = $std->fetch();
			$personid = intval($row['id']);

			//Insert into Kunde Tabelle mit FK von vorherigem Select
			$sql = 'INSERT INTO `kunde` ( `Kundennummer`, `Führerscheinsdatum`, `PersonId`) VALUES ( :nummer, :datum, :personid)';

			$stb = $db->prepare($sql);

			$stb->bindParam(':nummer', $pkundennummer, PDO::PARAM_STR);
			$stb->bindParam(':datum', $pführerscheindatum, PDO::PARAM_STR);
			$stb->bindParam(':personid', $personid, PDO::PARAM_STR);

			echo $pkundennummer . ' ' . $pführerscheindatum . ' ' . $personid;
			$stb->execute();

			echo '<p>Kunde erfolgreich erstellt!</p>';
			require_once('app/views/pages/home.php');
		}
	}
?>