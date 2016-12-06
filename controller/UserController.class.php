<?php
	class UserController extends Controller {
	
		public function defaultAction($request) {
			/*Re-définir la méthode defaultAction et utiliser de nouvelles vues spécifiques (UserView).
			Par exemple, afficher les informations de l’utilisateur connecté (nom, email, ...)*/
			$view = new UserView($this);
			$view->render();
		}
		
		
/*################################################################################################################
										Partie Gestion de compte
##################################################################################################################*/

		public function validateSuppressionCompte($args) {
			$id=UserModel::get_Id();
			UserModel::supprimerCompte($id);
			$view = new UserCompteSupprimeView($this);
			$view->render(); 
		} 
		
		public function adminValidateSuppressionCompte($args) {
			$id=UserModel::get_Id();
			UserModel::supprimerCompte($id);
			$view = new UserCompteSupprimeView($this);
			$view->render(); 
		} 
		
		public function supprimerCompte(){
			$view = new UserSupprimerCompteView($this);
			$view->render();
		}
		
		public function supprimerCompteUtilisateur($args){
			if(isset($_GET['idSuppr'])){
				$id=$_GET['idSuppr'];
			}
			UserModel::supprimerCompte($id);
			$view = new AdminCompteUserSupprimeView($this);
			$view->render(); 
		}
		
		public function deconnection($requestArg) {
			session_start();
			session_unset();
			session_destroy();
			
			header('Location: index.php');		//direction l'index. pourquoi pas besoin de faire de dispatch ?
			$controller = Dispatcher::dispatch($newRequest);
			$controller->execute();
			$view = new AnonymousView($this);  	//on retourne en mode anonymous
			
			$view->render(); 
		}
		
		public function administration() {
			$view = new AdminView($this);
			$view->render(); 
		}
		
/*################################################################################################################
										Partie Evenements
##################################################################################################################*/
		
		public function eventListDiv(){
			$view = new UserEventListView($this);
			$view->render();
		}
		
		public function eventShow(){
			$view = new UserEventView($this);
			$view->render();
		}
		
		public function userParticiper($args){
			$ide=EventModel::get_Id();
			$idu=UserModel::get_Id();
			date_default_timezone_set("Europe/Madrid");
			$date= date("Y-m-d");
			$tarif = $args->read('mode');
			
			//Test si l'user est déjà inscrit
			if(ParticiperModel::isUserAlreadyParticiper($ide,$idu)){
				$view = new AlreadyParticiperView($this);
                $view->render();
			}
			else{
				$view = new UserEventInscriptionValideeView($this);
				$view->render();
				ParticiperModel::userParticiper($ide,$idu,$tarif,$date);
			}
		}
		
		public function userDeparticiper(){
			$view = new UserEventDesinscriptionView($this);
			$view->render();
			$ide=EventModel::get_Id();
			$idu=UserModel::get_Id();
			ParticiperModel::userDeparticiper($ide,$idu);			
		}

/*################################################################################################################
										Partie Gestion
##################################################################################################################*/	

		
		public function gererListEvent(){
			$view = new UserEventGererListView($this);
			$view->render();
		}
		
		public function gererEvent(){
			$view = new UserEventGererView($this);
			$view->render();
		}
		
		public function modifierEvent(){
			$view = new UserModifierEventView($this);
			$view->render();
		}
		
		public function validateModificationEvent($args) {	
			$idu=UserModel::get_id();
			$ide=EventModel::get_id();
           
				
                   $tl = $args->read('modifTL');
				if($tl!=NULL)
					EventModel::setTL($TL,$ide);
				$desc = $args->read('modifD'); 
				if($desc!=NULL)
					EventModel::setDescription($desc,$ide);
				
				$cat = $args->read('modifC');
				if($cat!=NULL)
					EventModel::setCategorie($cat,$ide);
				AppartenirModel::setCategorie($cat,$ide);
				
                $view = new UserEventGererView($this);
                $view->render();
            }
		
		
		public function supprimerEvent(){
			$ide = EventModel::get_Id();
			EventModel::supprimerCoursAdmin($ide);
			$view = new CoursSupprimeView($this);
			$view->render();
		}
		
		public function creerEvent(){
			$view = new UserEventCreationView($this);
			$view->render();
		}
		
		public function creationEventValidee($args){
			
			$tc = $args->read('TC');
			if($tc==NULL) {       
            //le mec a choisi un login déjà existant, renvoit un message d'erreur    
                $view = new ErreurCreationEventView($this,'creerEvent');
                $view->setArg('inscErrorText',"Merci de renseigner le titre de votre cours!");
                $view->render();
            }
			if(EventModel::isTCUsed($tc)) {       
            //le mec a choisi un login déjà existant, renvoit un message d'erreur    
                $view = new ErreurCreationEventView($this,'creerEvent');
                $view->setArg('inscErrorText',"Ce titre est déjà utilisé, merci d'en choisir un autre");
                $view->render();
            }
			else{
				
				$tl = $args->read('TL');
				$deb = $args->read('yearO').'-'.$args->read('monthO').'-'.$args->read('dayO');
				$fin = $args->read('yearF').'-'.$args->read('monthF').'-'.$args->read('dayF');
				if($fin<$deb){
					$view = new ErreurCreationEventView($this,'creerEvent');
					$view->setArg('inscErrorText', "Merci d'indiquer une date de fin postérieure à l'ouverture du cours.");
					$view->render();
				}
				else{						
					$maxsize = $args->read('MAX_FILE_SIZE');
				
					$desc = $args->read('desc');
					$idu= UserModel::get_Id();
					
					$cat = $args->read('cat');
					$prive=$args->read('private');
					$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					$extension_upload = strtolower(  substr(  strrchr($_FILES['image']['name'], '.')  ,1)  );
						
					 if ( in_array($extension_upload,$extensions_valides) ) {
						if($_FILES['image']['size']<2044*1024){
							  
							$img = (file_get_contents($_FILES['image']['tmp_name']));
						}
					}
						 
					 else 
						$img=file_get_contents("images/default.JPG");
					
					EventModel::create($idu,$tl,$tc,$deb,$fin,$desc,$img,$cat,$prive);
					//creation dans appartenir
					
					
						
						//ajout des produits
					$ide = EventModel::getIdFromTC($tc);
					AppartenirModel::create($ide,$cat);
					$idp = $args->read('produit');
					if($idp!="--"){
						$qteP = $args->read('quantiteP');
						$tarifP = $args->read('tarifP');
						ProposerModel::create($ide,$idp,$qteP,$tarifP);
					}
						
					$view = new UserEventCreeView($this);
					$view->render();
				}
			}
		}	

		
/*################################################################################################################
										Partie Admin
##################################################################################################################*/	

		public function supprimerCoursAdmin($args){
			if(isset($_GET['idEventSuppr'])){
				$ide=$_GET['idEventSuppr'];
			}
			EventModel::supprimerCoursAdmin($ide);
			$view = new AdminCoursSupprimeView($this);
			$view->render(); 
		}
		
		public function supprimerCours(){
			$view = new AdminSupprimerCoursView($this);
			$view->render();
		}
		
		public function adminValidateSuppressionCours($args) {
			$id=EventModel::get_Id();
			EventModel::supprimerCours($id);
			$view = new AdminCoursSupprimeView($this);
			$view->render(); 
		}
		
/*################################################################################################################
										Partie Produits
##################################################################################################################*/	

		public function userProduitListDiv(){
			$view = new UserProduitListView($this);
			$view->render();			
		}
		
		public function produitShow(){
			$view = new UserProduitView($this);
			$view->render();
		}
		
		public function userAcheterProduit($args){
			$ide=EventModel::get_Id();
			$idu=UserModel::get_Id();
			$idp=ProduitModel::get_Id();
			date_default_timezone_set("Europe/Madrid");
			$date= date("Y-m-d");
			$qte = $args->read('qteProduit');
			$mode = $args->read('mode');
		
			//si plus de produits
			if($qte=='none'||$qte==0){
				$view = new UserPasAcheterProduitView($this);
				$view->render();
			}
			else{
			
				$newQte=ProposerModel::getQuantite($idp,$ide)-$qte;	//nouvelle qté en stock
				ProposerModel::setQuantite($newQte,$ide,$idp);
				
				if(!AcheterModel::isProduitAlreadyAcheter($idp,$idu)){
					AcheterModel::userAcheter($idu,$idp,$mode,$qte,$date);	//création d'un acheteur
					
					AcheterModel::setQuantiteAchetee($qte,$idu,$idp);
				}
				else{
					$achat=AchatModel::getQuantiteAchetee($idu,$idp)+$qte;
					AcheterModel::setQuantiteAchetee($achat,$idu,$idp);
				}
				
				$view = new UserAcheterProduitView($this);
				$view->render();
			}
		}
		
		public function developpeuses(){
			$view = new UserDeveloppeusesView($this);
			$view->render();
		}

/*################################################################################################################
										Partie Profil
##################################################################################################################*/	
	
		public function userProfil(){
			$view = new UserProfilView($this);
			$view->render();
		}
		
		public function modifierProfil(){
			$view = new UserModifierProfilView($this);
			$view->render();
		}
		
		public function validateModificationProfil($args) {	
			$id=UserModel::get_id();
            $password = $args->read('modifPassword');
            $confirmPassword = $args->read('confirmModifPassword');
                           
            if($password!=$confirmPassword){
                $view = new ErreurModificationProfilView($this,'inscription');
                $view->setArg('inscErrorText', 'Le mot de passe rentré et sa confirmation sont différents.');
                $view->render();
            }
            else{
				$mail = $args->read('modifMail');
				if($mail!=NULL)
					UserModel::setMail($mail,$id);
                   $nom = $args->read('modifNom');
				if($nom!=NULL)
					UserModel::setNom($nom,$id);
				$prenom = $args->read('modifPrenom'); 
				if($prenom!=NULL)
					UserModel::setPrenom($prenom,$id);
				if($password!=NULL && $confirmPassword!=NULL)
					UserModel::setMdp($password,$id);
				$addr = $args->read('modifAddress');
				if($addr!=NULL)
					UserModel::setAdresse($addr,$id);
				$date = $args->read('modifDate'); 
				if($date!=NULL)
					UserModel::setDateNaissance($date,$id);
				$sexe = $args->read('modifSexe');
				if($sexe!=NULL)
					UserModel::setSexe($sexe,$id);
				$question = $args->read('modifQuestion');
				if($question!=NULL)
					UserModel::setQuestion($question,$id);
				$reponse = $args->read('modifReponse');
				if($reponse!=NULL)
					UserModel::setReponse($reponse,$id);
                $view = new UserProfilView($this);
                $view->render();
            }
		}
	}
?>