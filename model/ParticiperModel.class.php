<?php
	class ParticiperModel extends Model {
		
		public static function isUserAlreadyParticiper($ide,$idu){
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("SELECT ID_UTILISATEUR INTO participer_a WHERE ID_EVENEMENT=:ide AND ID_UTILISATEUR=:idu");
			$stmt->bindParam(':ide', $ide); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			if(!empty($donnees)) {		//on a déja le titre_court
				$stmt->closeCursor(); // Termine le traitement de la requête
				return true;
			}
			else {
				$stmt->closeCursor(); // Termine le traitement de la requête
				return false;
			}
			
		}
		
		public static function userParticiper($ide,$idu,$mode,$date) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO participer_a (ID_EVENEMENT,ID_UTILISATEUR,MODE_DE_PAIEMENT,DATE_INSCRIPTION) VALUES (:ide,:idu,:mode,:date)");
			$stmt->bindParam(':ide', $ide); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->bindParam(':mode', $mode); 
			$stmt->bindParam(':date', $date);
			$stmt->execute();
			
		} 
		
		
		public static function userDeparticiper($ide,$idu) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("DELETE FROM participer_a WHERE ID_EVENEMENT=:ide AND ID_UTILISATEUR=:idu" ); //pas de remboursement
			$stmt->bindParam(':ide', $ide); 
			$stmt->bindParam(':idu', $idu);
			$stmt->execute();
	
		} 
		
	
	
	
	
/*################################################################################################################
										Partie accesseurs
##################################################################################################################*/
	
	
		public static function getnbInscription($idu){	
			$myPDO = parent::db();	
			$sql = "SELECT TITRE_COURT FROM evenement,participer_a WHERE ID_UTILISATEUR=:idu AND evenement.ID_EVENEMENT=participer_a.ID_EVENEMENT";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$array = array();
			
			while(!empty($donnees)) {	
				$tab = $donnees->TITRE_COURT;
				array_push($array,$tab);
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();		
			return $array;
		}
	}
	
?>