<?php
	class AppartenirModel extends Model {
		
		public static function create($ide,$cat) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO appartenir (ID_EVENEMENT, TYPE_CATEGORIE) VALUES (:ide,:cat)"); 
			$stmt->bindParam(':ide', $ide); 
			$stmt->bindParam(':cat', $cat);
			
			$stmt->execute();
		}
		
		public static function tableauCategorie() {	//affiche uniquement les events publics
			
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT TYPE_CATEGORIE FROM categorie";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$array = array();
			
			while(!empty($donnees)) {	
				// $array[$i]=$donnees->TITRE_COURT;
				// $i++;
				$tab = $donnees->TYPE_CATEGORIE;
				array_push($array,$tab);
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();
						
			return $array;
		}
		
		
/*################################################################################################################
										Partie accesseurs
##################################################################################################################*/

	
		public static function getIdEvent($ide){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_EVENEMENT FROM appartenir WHERE ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':ide', $ide); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$tc=$donnees->ID_EVENEMENT;
			$stmt->closeCursor();
			
			return $tc;
		}
		
		public static function setCategorie($q,$ide){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE appartenir SET TYPE_CATEGORIE=:q WHERE ID_EVENEMENT=:ide";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':q', $q); 
			$stmt->bindParam(':ide', $ide);
			
			$stmt->execute();
		}
		
		public static function getCategorie($ide){	
			$myPDO = parent::db();	
			$sql = "SELECT TYPE_CATEGORIE FROM appartenir WHERE ID_EVENEMENT=:ide";		
			$stmt = $myPDO->prepare($sql);
			$stmt->bindParam(':ide', $ide); 			
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$qte= $donnees->QUANTITE_PRODUIT;
			$stmt->closeCursor();
			return $qte;
		}
		
		
		
		
	}
?>