<?php
	class ProduitModel extends Model {
		
		public static function create($id,$tarif,$lib,$desc) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO produit (ID_PRODUIT, TARIF, LIBELLE_PRODUIT, DESCRIPTION_PRODUIT) VALUES (:id,:tarif,:lib,:desc)"); 
			$stmt->bindParam(':id', $id); 
			$stmt->bindParam(':tarif', $tarif);
			$stmt->bindParam(':lib', $lib);
			$stmt->bindParam(':desc', $desc);
			
			$stmt->execute();
		}
		
		public static function getIdFromLib($lib){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_PRODUIT FROM produit WHERE LIBELLE_PRODUIT=:lib";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':lib', $lib); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$id=$donnees->ID_PRODUIT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function produitTableauEvent() {	//affiche tous les events
			
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT LIBELLE_PRODUIT FROM produit";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
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
		
		public static function get_Id(){	
			if(isset($_GET['idProduit'])){
				$id=$_GET['idProduit'];
					return $id;
			}
			else
				return 'noProduct';
		}
		
		public static function getIdProduit($id){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_PRODUIT FROM produit WHERE ID_PRODUIT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$id=$donnees->ID_PRODUIT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function getLibelle($id){	
			$myPDO = parent::db();	
			$sql = "SELECT LIBELLE_PRODUIT FROM produit WHERE ID_PRODUIT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$lib=$donnees->LIBELLE_PRODUIT;
			$stmt->closeCursor();
			
			return $lib;
		}
				
		public static function getDescription($id){	
			$myPDO = parent::db();	
			$sql = "SELECT DESCRIPTION_PRODUIT FROM produit WHERE ID_PRODUIT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$desc=$donnees->DESCRIPTION_PRODUIT;
			$stmt->closeCursor();
			
			return $desc;
		}
		
		
		
	}
?>