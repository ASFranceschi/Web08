<?php
	class PossederModel extends Model {
		
		public static function create($ide) {	//creation d'un evt avec son tarif
			$myPDO = parent::db();
			if(EventModel::isPrivate($ide)){
				$stmt = $myPDO->prepare("INSERT INTO posseder (ID_EVENEMENT, ID_TARIF) VALUES (:ide,2)"); 
				$stmt->bindParam(':ide', $ide); 
				$stmt->execute();
			}
			else{
				$stmt = $myPDO->prepare("INSERT INTO posseder (ID_EVENEMENT, ID_TARIF) VALUES (:ide,1)"); 
				$stmt->bindParam(':ide', $ide); 
				$stmt->execute();
			}
			
		} 
		
		public static function maj($ide,$tarif) {	//creation d'un evt avec son tarif
			$myPDO = parent::db();
				$stmt = $myPDO->prepare("INSERT INTO posseder (ID_EVENEMENT, ID_TARIF) VALUES (:ide,:tarif)"); 
				$stmt->bindParam(':ide', $ide); 
				$stmt->bindParam(':tarif', $tarif); 
				$stmt->execute();
			}
		
		
		public static function getTarif($id){	
			$myPDO = parent::db();	
			$sql = "SELECT PRIX_EVENEMENT FROM tarif, posseder WHERE ID_EVENEMENT=:id AND posseder.ID_TARIF=tarif.ID_TARIF";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$tarif=$donnees->PRIX_EVENEMENT;
			$stmt->closeCursor();
			
			return $tarif;
		}
		
	}
	
?>