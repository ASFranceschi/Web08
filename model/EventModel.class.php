<?php
	class EventModel extends Model {
		
		public static function isPrivate($id) {
			//interroge la base de donnée pour savoir si un titre_court est utilisé ou non
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT EVENEMENT_PRIVE FROM evenement WHERE ID_EVENEMENT=:id";	//cette chaine de caractère sera stockée dans un autre document
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$event=$donnees->EVENEMENT_PRIVE;
			$stmt->closeCursor();
			
			return $event;	//1 si privé
		}
			
		public static function isTcUsed($tc) {
			//interroge la base de donnée pour savoir si un titre_court est utilisé ou non
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT TITRE_COURT FROM evenement WHERE TITRE_COURT=:tc";	//cette chaine de caractère sera stockée dans un autre document
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':tc', $tc); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
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
		
		public static function create($idu,$tl,$tc,$deb,$fin,$desc,$img,$cat,$prive) {	//creation d'un evt
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO evenement (TITRE_LONG, TITRE_COURT, OUVERTURE, FERMETURE,DESCRIPTION,IMAGE,CATEGORIE,EVENEMENT_PRIVE) VALUES (:tl,:tc,:deb,:fin,:desc,:img,:cat,:prive)"); 
			$stmt->bindParam(':tl', $tl); 
			$stmt->bindParam(':tc', $tc);
			$stmt->bindParam(':deb', $deb);
			$stmt->bindParam(':fin', $fin);
			$stmt->bindParam(':desc', $desc); 
			$stmt->bindParam(':img', $img); 
			$stmt->bindParam(':cat', $cat); 
			$stmt->bindParam(':prive', $prive); 
			$stmt->execute();
			
			//lien avec le tarif
			
			$ide = EventModel::getIdFromTC($tc);
			
			PossederModel::create($ide);
			GererModel::setCreateur($idu,$ide);
		} 
		
		public static function supprimerCoursAdmin($id){
			$myPDO = parent::db();
			$sql = "DELETE FROM evenement WHERE evenement.ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function userTableauEvent() {	//affiche tous les events
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT TITRE_COURT FROM evenement";	
			$stmt = $myPDO->prepare($sql); 
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
			return $array;
		}
		
		public static function compteurEvent() {
			$myPDO = parent::db();
			$sql = "SELECT ID_EVENEMENT FROM evenement";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$array = array();
			
			while(!empty($donnees)) {	
				$array[] = $donnees->ID_EVENEMENT;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}
			$stmt->closeCursor();			
			return $array;
		}
		
		public static function anonymousTableauEvent() {	//affiche uniquement les events publics
			
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT TITRE_COURT FROM evenement WHERE EVENEMENT_PRIVE=0";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$array = array();
			
			while(!empty($donnees)) {	
				// $array[$i]=$donnees->TITRE_COURT;
				// $i++;
				$tab = $donnees->TITRE_COURT;
				array_push($array,$tab);
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();
			//  print_r($array);			
			return $array;
		}
		
/*################################################################################################################
										Partie accesseurs
##################################################################################################################*/
		
		public static function get_Id(){	//permet de récupérer l'id de l'event depuis le get
			if(isset($_GET['idEvent'])){
				$id=$_GET['idEvent'];
					return $id;
			}
			else
				return 'error';
		}
		
		public static function getId($id){	//permet de récupérer l'id de l'événement
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT ID_EVENEMENT FROM evenement WHERE ID_EVENEMENT=:id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$id=$donnees->ID_EVENEMENT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function getIdFromTC($tc){	
			$myPDO = parent::db();	
			$sql = "SELECT ID_EVENEMENT FROM evenement WHERE TITRE_COURT=:tc";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':tc', $tc); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$id=$donnees->ID_EVENEMENT;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function getTC($id){	
			$myPDO = parent::db();	
			$sql = "SELECT TITRE_COURT FROM evenement WHERE ID_EVENEMENT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$tc=$donnees->TITRE_COURT;
			$stmt->closeCursor();
			
			return $tc;
		}
		public static function setTL($TL, $ide){	
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE evenement SET TITRE_LONG=:TL WHERE ID_EVENEMENT=:ide ";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':TL', $TL); 
			$stmt->bindParam(':ide', $ide);
			
			$stmt->execute();
		}
		
		public static function getTL($id){	
			$myPDO = parent::db();	
			$sql = "SELECT TITRE_LONG FROM evenement WHERE ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$tl=$donnees->TITRE_LONG;
			$stmt->closeCursor();
			
			return $tl;
		}
		
		
		public static function getOuverture($id){	
			$myPDO = parent::db();	
			$sql = "SELECT OUVERTURE FROM evenement WHERE ID_EVENEMENT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$ouverture=$donnees->OUVERTURE;
			$stmt->closeCursor();
			
			return $ouverture;
		}
		
		public static function getFermeture($id){	//
			$myPDO = parent::db();	
			$sql = "SELECT FERMETURE FROM evenement WHERE ID_EVENEMENT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$fermeture=$donnees->FERMETURE;
			$stmt->closeCursor();
			
			return $fermeture;
		}
		
		public static function setDescription($desc, $ide){	
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE evenement SET DESCRIPTION=:desc WHERE ID_EVENEMENT=:ide ";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':desc', $desc); 
			$stmt->bindParam(':ide', $ide);
			
			$stmt->execute();
		}
		
		public static function getDescription($id){	//
			$myPDO = parent::db();	
			$sql = "SELECT DESCRIPTION FROM evenement WHERE ID_EVENEMENT=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$desc=$donnees->DESCRIPTION;
			$stmt->closeCursor();
			
			return $desc;
		}
		
		public static function getImage($id){	
			$myPDO = parent::db();	
			/*cette fonction est implémentée dans content_userEventListTemplate.php
			on ne fait que la connexion ici
			*/
			return$myPDO;
		}
		
		public static function setCategorie($cat, $ide){	
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE evenement SET CATEGORIE=:cat WHERE ID_EVENEMENT=:ide ";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':cat', $cat); 
			$stmt->bindParam(':ide', $ide);
			
			$stmt->execute();
		}
				
		public static function getCategorie($id){	
			$myPDO = parent::db();	
			$sql = "SELECT CATEGORIE FROM evenement WHERE ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$cat=$donnees->CATEGORIE;
			$stmt->closeCursor();
			
			return $cat;
		}
		
		public static function setNb_Anonymes($id){
			$compteur=EventModel::getNb_Anonymes($id)+1;
			$myPDO = parent::db();	
			$sql = "UPDATE evenement SET NB_ANONYMES=:compteur WHERE ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':compteur', $compteur); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		public static function getNb_Anonymes($id){	
			$myPDO = parent::db();	
			$sql = "SELECT NB_ANONYMES FROM evenement WHERE ID_EVENEMENT=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			
			$nb=$donnees->NB_ANONYMES;
			$stmt->closeCursor();
			
			return $nb;
		}
	}
?>