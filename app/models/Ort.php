<?php
	class Ort {
		public $idort;
		public $plz;
		public $bezeichnung;
		public $landid;

		public function __construct($id, $plz, $bezeichnung, $landid)
		{
			$this->id = $id;
			$this->plz = $plz;
			$this->bezeichnung = $bezeichnung;
			$this->landid = $landid;
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
	}
?>