<?php
	class ProposerModel extends Model {
		
		public static function create($ide,$idp,$qte,$tarif) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO proposer (ID_EVENEMENT, ID_PRODUIT, QUANTITE_PRODUIT, PRIX_PRODUIT) VALUES (:ide,:idp,:qte,:tarif)"); 
			$stmt->bindParam(':ide', $ide); 
			$stmt->bindParam(':idp', $idp);
			$stmt->bindParam(':qte', $qte);
			$stmt->bindParam(':tarif', $tarif);
			
			$stmt->execute();
		}
		
		
		public static function userTableauProduit($ide) {	//affiche tous les produits
			
			$myPDO = parent::db();
			$sql = "SELECT LIBELLE_PRODUIT FROM produit, proposer WHERE ID_EVENEMENT=:ide AND proposer.ID_PRODUIT=produit.ID_PRODUIT";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':ide', $ide); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$array = array();
			
			while(!empty($donnees)) {	
				
				$array[] = $donnees->LIBELLE_PRODUIT;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();						
			return $array;
		
		}
		
/*################################################################################################################
										Partie accesseurs
##################################################################################################################*/

		public static function getIdProduitPropose($id){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_PRODUIT FROM proposer WHERE ID_PRODUIT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$id=$donnees->ID_PRODUIT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function getIdProduitProposeFrom($ide){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_PRODUIT FROM proposer WHERE ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$id=$donnees->ID_PRODUIT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function getIdEvent($ide){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_EVENEMENT FROM proposer WHERE ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':ide', $ide); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$tc=$donnees->ID_EVENEMENT;
			$stmt->closeCursor();
			
			return $tc;
		}
		public static function setQuantite($q,$ide, $idp){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE proposer SET QUANTITE_PRODUIT=:q WHERE ID_EVENEMENT=:ide AND ID_PRODUIT=:idp";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':q', $q); 
			$stmt->bindParam(':ide', $ide);
			$stmt->bindParam(':idp', $idp); 
			$stmt->execute();
		}
		
		public static function getQuantite($idp,$ide){	
			$myPDO = parent::db();	
			$sql = "SELECT QUANTITE_PRODUIT FROM proposer WHERE ID_PRODUIT=:idp AND ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idp', $idp);
			$stmt->bindParam(':ide', $ide); 			
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$qte= $donnees->QUANTITE_PRODUIT;
			$stmt->closeCursor();
			return $qte;
		}
		
		public static function setPrix($p,$ide, $idp){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE proposer SET PRIX_PRODUIT=:p WHERE ID_EVENEMENT=:ide AND ID_PRODUIT=:idp";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':p', $p); 
			$stmt->bindParam(':ide', $ide);
			$stmt->bindParam(':idp', $idp); 
			$stmt->execute();
		}

		public static function getPrix($idp, $ide){	
			$myPDO = parent::db();	
			$sql = "SELECT PRIX_PRODUIT FROM proposer WHERE ID_PRODUIT=:idp AND ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idp', $idp);
			$stmt->bindParam(':ide', $ide); 			
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$prix=$donnees->PRIX_PRODUIT;
			$stmt->closeCursor();
			
			return $prix;
		}
		
		
		
	}
?>