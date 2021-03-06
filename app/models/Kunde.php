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
			try 
			{
  				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

				$db->beginTransaction();

				$options = [
	    			'cost' => 11,
	    			'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
				];

				$passworthash = password_hash( $passwort, PASSWORD_BCRYPT, $options );

				//Insert into Person Tabelle:
				$sql = 'INSERT INTO `person` ( `Name`, `Vorname`, `Strasse`, `Hausnummer`, `Geburtsdatum`, `OrtId`, `Passwort`, `Email`) 
						VALUES ( :name, :vorname, :strasse, :hausnummer, :geburtsdatum, :ortid, :passwort, :email)';

				$std = $db->prepare($sql);

				$std->bindParam(':name', $name, PDO::PARAM_STR);
				$std->bindParam(':vorname', $vorname, PDO::PARAM_STR);
				$std->bindParam(':strasse', $strasse, PDO::PARAM_STR);
				$std->bindParam(':hausnummer', $hausnummer, PDO::PARAM_STR);
				$std->bindParam(':geburtsdatum', $geburtsdatum, PDO::PARAM_STR);
				$std->bindParam(':ortid', $ortId, PDO::PARAM_STR);
				$std->bindParam(':passwort', $passworthash, PDO::PARAM_STR);
				$std->bindParam(':email', $email, PDO::PARAM_STR);

				$std->execute();

				//PersonId von gerade erstellten Person holen
				$sql = 'SELECT id FROM person WHERE email = :email';

				$std = $db->prepare($sql);

				$std->bindParam('email', $email, PDO::PARAM_STR);

				$std->execute();

				$row = $std->fetch();
				$personid = intval($row['id']);

				//Insert into Kunde Tabelle mit FK von vorherigem Select
				$sql = 'INSERT INTO `kunde` ( `Kundennummer`, `Führerscheinsdatum`, `PersonId`) VALUES ( :nummer, :datum, :personid)';

				$std = $db->prepare($sql);

				$std->bindParam(':nummer', $pkundennummer, PDO::PARAM_STR);
				$std->bindParam(':datum', $pführerscheindatum, PDO::PARAM_STR);
				$std->bindParam(':personid', $personid, PDO::PARAM_STR);

				$std->execute();

				$db->commit();

				echo '<p>Kunde erfolgreich erstellt!</p>';
				$page = $_SERVER['PHP_SELF'];
				header("Refresh: 0; url=$page");  
			} 
			catch (Exception $e) {
				  $db->rollBack();
				  echo "Failed: " . $e->getMessage();
			}
		}

		public function checkKundennummerExists($kundennummer){
			$db = Db::getInstance();

			$sql = 'SELECT count(*) FROM `Kunde` WHERE kundennummer = :kundennummer';

			$sts = $db->prepare($sql);

			$sts->bindParam(':kundennummer', $kundennummer, PDO::PARAM_STR);

			$sts->execute();

			$number_of_rows = $sts->fetchColumn();

			if ($number_of_rows < 1) {
				return FALSE;
			}
			else{
				return TRUE;
			}
		}
	}
?>