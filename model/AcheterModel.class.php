<?php
	class AcheterModel extends Model {
		
		
		public static function isProduitAlreadyAcheter($idp,$idu){
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("SELECT ID_UTILISATEUR INTO acheter WHERE ID_PRODUIT=:idp AND ID_UTILISATEUR=:idu");
			$stmt->bindParam(':idp', $idp); 
			$stmt->bindParam(':idu', $idu); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			if(!empty($donnees)) {		
				$stmt->closeCursor(); 
				return true;
			}
			else {
				$stmt->closeCursor();
				return false;
			}
			
		}
		
		public static function userAcheter($idu,$idp,$mode,$qte,$date) {	
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO acheter (ID_PRODUIT,ID_UTILISATEUR,MODE_PAIEMENT,QUANTITE_ACHETEE,DATE_ACHAT,ETAT_COMMANDE) VALUES (:idp,:idu,:mode,:qte,:date,'En cours')");
			$stmt->bindParam(':idu',$idu); 
			$stmt->bindParam(':idp', $idp);
			$stmt->bindParam(':mode',$mode); 
			$stmt->bindParam(':qte', $qte);
			$stmt->bindParam(':date',$date);
			$stmt->execute();
			
		} 
		
		/*################################################################################################################
										Partie accesseurs
##################################################################################################################*/

		public static function setQuantiteAchetee($q,$idu,$idp){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE acheter SET QUANTITE_ACHETEE=:q WHERE ID_UTILISATEUR=:idu AND ID_PRODUIT=:idp";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':q', $q); 
			$stmt->bindParam(':idu', $idu);
			$stmt->bindParam(':idp', $idp); 
			$stmt->execute();
		}
		
		public static function getQuantiteAchetee($idu,$idp){	
			$myPDO = parent::db();	
			$sql = "SELECT QUANTITE_ACHETEE FROM acheter WHERE ID_UTILISATEUR=:idu AND ID_PRODUIT=:idp";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':idp', $idp); 
			$stmt->bindParam(':idu', $idu);
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$qte= $donnees->QUANTITE_ACHETEE;
			
			$stmt->closeCursor();
			
			return $qte;
		}
		
		
	 }
?>