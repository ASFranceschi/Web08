<?php
	class GererModel extends Model {
		
		public static function gererTableauEvent($idu) {	//affiche tous les events
			
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT TITRE_COURT FROM evenement,gerer WHERE ID_UTILISATEUR=:idu AND gerer.ID_EVENEMENT=evenement.ID_EVENEMENT";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->execute();
			
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$array = array();
			
			while(!empty($donnees)) {	
				// $tab = array($donnees->TITRE_COURT);
				// array_push($array,$tab);
				$array[] = $donnees->TITRE_COURT;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();
			
			//  print_r($array);
						
			return $array;
		
		}
		
	public static function getMailCreateur($id){	//fonction plus dure !
			$myPDO = parent::db();	
			$sql = "SELECT MAIL FROM utilisateur,gerer WHERE ID_EVENEMENT=:id AND gerer.ID_UTILISATEUR=utilisateur.ID_UTILISATEUR" ;	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$mail=$donnees->MAIL;
			$stmt->closeCursor();
			
			return $mail;
	}	
	
	public static function setCreateur($idu,$ide){	//fonction plus dure !
			$myPDO = parent::db();	
			$sql = "INSERT INTO gerer (ID_UTILISATEUR,ID_EVENEMENT) VALUES (:idu, :ide)" ;	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->bindParam(':ide', $ide);
			$stmt->execute();
			
			$role= UserModel::getRole($idu);
				if($role == 'P')
					UserModel::setRole($idu,'G');
			
			
		}
		
		public static function supprimerEvent($ide){
			$myPDO = parent::db();
			$sql = "DELETE FROM evenement WHERE evenement.ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $ide); 
			$stmt->execute();
		}
	
	}
?>