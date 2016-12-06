<?php
	class UserModel extends Model {
			
		public static function isLoginUsed($login) {
			//interroge la base de donnée pour savoir si un login est utilisé ou non
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MAIL FROM utilisateur WHERE MAIL=:mail";	//cette chaine de caractère sera stockée dans un autre document)
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $login); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			if(!empty($donnees)) {		//on a déja l'email stocké 
				$stmt->closeCursor(); // Termine le traitement de la requête
				return true;
			}
			else {
				$stmt->closeCursor(); // Termine le traitement de la requête
				return false;
			}
		}
		
		public static function create($mail,$password,$nom,$prenom,$addr,$date,$sexe,$q,$r) {	//insère dans la base un nouvel utilisateur et retourne une instance de la classe User représentant ce nouvel utilisateur
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("INSERT INTO utilisateur (MAIL, MOT_DE_PASSE, NOM, PRENOM,ADRESSE,DATE_NAISSANCE,SEXE,QUESTION,REPONSE) VALUES (:mail,:password,:nom,:prenom,:addr,:date,:sexe,:q,:r)"); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':nom', $nom);
			$stmt->bindParam(':prenom', $prenom);
			$stmt->bindParam(':addr', $addr); 
			$stmt->bindParam(':date', $date); 
			$stmt->bindParam(':sexe', $sexe); 
			$stmt->bindParam(':q', $q); 
			$stmt->bindParam(':r', $r); 
			$stmt->execute();
		}
		
		public static function supprimerCompte($id){
			$myPDO = parent::db();
			$sql = "DELETE FROM utilisateur WHERE utilisateur.ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function modificationProfil($mail,$password,$nom,$prenom,$addr,$date,$sexe) {	//modifie dans la base un nouvel utilisateur et retourne une instance de la classe User représentant ce nouvel utilisateur
			$myPDO = parent::db();
			$stmt = $myPDO->prepare("UPDATE utilisateur SET (MAIL=:mail, MOT_DE_PASSE=:password, NOM=:nom, PRENOM=:prenom,ADRESSE=:addr,DATE_NAISSANCE=:date,SEXE=:sexe) WHERE utilisateur.ID_UTILISATEUR=:mail"); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->bindParam(':password', $password);
			$stmt->bindParam(':nom', $nom);
			$stmt->bindParam(':prenom', $prenom);
			$stmt->bindParam(':addr', $addr); 
			$stmt->bindParam(':date', $date); 
			$stmt->bindParam(':sexe', $sexe); 
			$stmt->execute();
		}
			 
		// public function testRead($mail,$password,$nom,$prenom,$addr,$date,$sexe){	//permet de tester si les champs sont nuls ou pas assez sécurisés
			// foreach
			
		// }
		
		public static function tableauUsers() {
			//interroge la base de donnée pour savoir si un login est utilisé ou non
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MAIL, MOT_DE_PASSE FROM utilisateur";	//récupère tous les logins et mdp		
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			$array = array();
			
			while(!empty($donnees)) {	
				$tab = array($donnees->MAIL => $donnees->MOT_DE_PASSE);		//tableau commencant à 0
				array_push($array,$tab);
				//$array[] = $donnees->MOT_DE_PASSE; ne marche pas
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}

			$stmt->closeCursor();
		//	print_r($array);			
			return $array;
		
		}
		
		public static function compteurUsers() {
			$myPDO = parent::db();
			$sql = "SELECT ID_UTILISATEUR FROM utilisateur";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->execute();
			
			$reponse = $myPDO->query($sql);
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$array = array();
			
			while(!empty($donnees)) {	
				$array[] = $donnees->ID_UTILISATEUR;
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			}
			$stmt->closeCursor();			
			return $array;
		}
		
		public static function tentativeDeConnexion($login, $password) {
			//interroge la base de donnée pour savoir si le login existe et le mdp correspond
			if (!UserModel::isLoginUsed($login)){
				return false;
			}
			else {
				$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
				$sql = "SELECT MAIL, MOT_DE_PASSE FROM utilisateur WHERE MAIL=:mail";	//récupère tous les logins et mdp		
				$stmt = $myPDO->prepare($sql); 
				$stmt->bindParam(':mail', $login); 
				$stmt->execute();
				$reponse = $myPDO->query($sql);	//on exécute la requete sql
				$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
				if($donnees->MOT_DE_PASSE === $password) {		//on a déja l'email stocké 
					$stmt->closeCursor(); // Termine le traitement de la requête
					return true;
				}
				else {
					$stmt->closeCursor(); // Termine le traitement de la requête
					return false;
				}
			}
		}
			
/*################################################################################################################
										Partie Accesseurs
##################################################################################################################*/
		
		public static function get_Id(){	//permet de récupérer l'id de l'utilisateur depuis le get
			if(isset($_GET['idUser'])){
				$id=$_GET['idUser'];
					return $id;
			}
			else
				return 'anonymous';
		}
		
		
		public static function getId($mail){	//permet de récupérer l'id de l'utilisateur
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT ID_UTILISATEUR FROM utilisateur WHERE MAIL=:mail";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$id=$donnees->ID_UTILISATEUR;
			$stmt->closeCursor();
			
			return $id;
		}
		
		public static function get_Mail(){	//permet de récupérer le mail de l'utilisateur depuis le get
			if(isset($_GET['mail'])){
				$mail=$_GET['mail'];
					return $mail;
			}
			else
				return 'anonymous';
		}
		
		public static function getMail($id){	//permet de récupérer le mail de l'utilisateur
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MAIL FROM utilisateur WHERE ID_UTILISATEUR=:id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mail=$donnees->MAIL;
			$stmt->closeCursor();
			
			return $mail;
		}
		
		public static function setMail($mail,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE utilisateur SET MAIL=:mail WHERE ID_UTILISATEUR=:id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getMdp($mail){	//pour la récupération du mdp oublié
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MOT_DE_PASSE FROM utilisateur WHERE MAIL=:mail";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->execute();
			//$reponse = $myPDO->query($sql);	//on exécute la requete sql
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	//les résultats de la requete sont stockés dans $donnees
			
			$mdp=$donnees->MOT_DE_PASSE;
			$stmt->closeCursor();
			
			return $mdp;
		}
		
		public static function setMdp($mdp,$id){	//a partir de mtn, dans l'url on va avoir iduser
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "UPDATE utilisateur SET MOT_DE_PASSE=:mdp WHERE ID_UTILISATEUR=:id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mdp', $mdp); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getMdpProfil($id){	//pour la récupération du profil utilisateur
			$myPDO = parent::db();	//création de l'objet PDO ObjetRandom
			$sql = "SELECT MOT_DE_PASSE FROM utilisateur WHERE ID_UTILISATEUR=:id";	//récupère le ID de user	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			
			$mdp=$donnees->MOT_DE_PASSE;
			$stmt->closeCursor();
			
			return $mdp;
		}
		
		public static function setPrenom($prenom,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET PRENOM=:prenom WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':prenom', $prenom); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getPrenom($id){
			$myPDO = parent::db();
			$sql = "SELECT PRENOM FROM utilisateur WHERE ID_UTILISATEUR=:id";
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);
			$prenom=$donnees->PRENOM;
			$stmt->closeCursor();
		
			return $prenom;
		}
		
		public static function setNom($nom,$id){	
			$myPDO = parent::db();
			$sql = "UPDATE utilisateur SET NOM=:nom WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':nom', $nom); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getNom($id){
			$myPDO = parent::db();	
			$sql = "SELECT NOM FROM utilisateur WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$nom=$donnees->NOM;
			$stmt->closeCursor();
		
			return $nom;
		}
		
		public static function setAdresse($addr,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET ADRESSE=:addr WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':addr', $addr); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getAdresse($id){	
			$myPDO = parent::db();	
			$sql = "SELECT ADRESSE FROM utilisateur WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$addr=$donnees->ADRESSE;
			$stmt->closeCursor();
			return $addr;
		}
		
		public static function setRole($id,$role){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET ROLE=:role WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':role', $role); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getRole($id){	
			$myPDO = parent::db();	
			$sql = "SELECT ROLE FROM utilisateur WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$role=$donnees->ROLE;
			$stmt->closeCursor();
		
			return $role;
		}
		
		public static function setDateNaissance($date,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET DATE_NAISSANCE=:date WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':date', $date); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getDateNaissance($id){	
			$myPDO = parent::db();
			$sql = "SELECT DATE_NAISSANCE FROM utilisateur WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$date=$donnees->DATE_NAISSANCE;
			$stmt->closeCursor();
			return $date;
		}
		
		public static function setSexe($sexe,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET SEXE=:sexe WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':sexe', $sexe); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getSexe($id){	
			$myPDO = parent::db();	
			$sql = "SELECT SEXE FROM utilisateur WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$sexe=$donnees->SEXE;
			$stmt->closeCursor();
		
			return $sexe;
		}
		
		public static function getQuestionProfil($id){	
			$myPDO = parent::db();	
			$sql = "SELECT QUESTION FROM utilisateur WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$question=$donnees->QUESTION;
			$stmt->closeCursor();
			return $question;
		}
		
		public static function getQuestion($mail){	
			$myPDO = parent::db();	
			$sql = "SELECT QUESTION FROM utilisateur WHERE MAIL=:mail";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$question=$donnees->QUESTION;
			$stmt->closeCursor();
			
			return $question;
		}
		
		public static function setQuestion($question,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET QUESTION=:question WHERE ID_UTILISATEUR=:id";		
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':question', $question); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
		
		public static function getReponseProfil($id){	
			$myPDO = parent::db();	
			$sql = "SELECT REPONSE FROM utilisateur WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$reponse=$donnees->REPONSE;
			$stmt->closeCursor();
			return $reponse;
		}
		
		public static function getReponse($mail){	
			$myPDO = parent::db();	
			$sql = "SELECT REPONSE FROM utilisateur WHERE MAIL=:mail";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':mail', $mail); 
			$stmt->execute();
			$donnees = $stmt->fetch(PDO::FETCH_OBJ);	
			$rep=$donnees->REPONSE;
			$stmt->closeCursor();
		
			return $rep;
		}
		
		public static function setReponse($reponse,$id){	
			$myPDO = parent::db();	
			$sql = "UPDATE utilisateur SET REPONSE=:reponse WHERE ID_UTILISATEUR=:id";	
			$stmt = $myPDO->prepare($sql); 
			$stmt->bindParam(':reponse', $reponse); 
			$stmt->bindParam(':id', $id); 
			$stmt->execute();
		}
	}
?>