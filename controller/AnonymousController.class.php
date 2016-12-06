<?php
	class AnonymousController extends Controller {
		
		public function __construct(){
			$request = Request::getCurrentRequest();
			parent::__construct($request);
		}
				
		public function defaultAction($request) {
			$view = new AnonymousView($this);
			$view->render();
		}

/*################################################################################################################
										Partie inscription
##################################################################################################################*/


		public function inscription($requestArg) {
			$view = new InscriptionView($this);  
			$view->render(); 
		}
		
		public function validateInscription($args) {     
            $email = $args->read('inscLogin'); 
			$messenger = $args->read('messenger');
            $dom = $args->read('domain');

            if ($email == NULL || $messenger==NULL)
                $login = NULL;
            else
                $login = $email . '@' . $messenger.'.'.$dom;
				

            if(UserModel::isLoginUsed($login)) {       
            //le mec a choisi un login déjà existant, renvoit un message d'erreur    
                $view = new ErreurInscriptionView($this,'inscription');
                $view->setArg('inscErrorText',"Ce mail est déjà utilisé, merci d'en choisir un autre");
                $view->render();
            }
            else {
                $password = $args->read('inscPassword');
                $confirmPassword = $args->read('confirmInscPassword');
				
				$question = $args->read('question');
                $reponse = $args->read('reponse');
				
                $prenom = $args->read('prenom');                
                if($login == NULL || $password==NULL || $confirmPassword==NULL || $prenom==NULL ||$reponse==NULL){    //pas de login, mdp, confirm'mdp, prénom renseignés
                    $view = new ErreurInscriptionView($this,'inscription');
                    $view->setArg('inscErrorText', 'Veuillez renseigner les champs obligatoires (*)');
                    $view->render();
                }
                else {
                    if($password!=$confirmPassword){
                        $view = new ErreurInscriptionView($this,'inscription');
                        $view->setArg('inscErrorText', 'Le mot de passe rentré et sa confirmation sont différents.');
                        $view->render();
                    }
                    else{
                        $nom = $args->read('nom');
						$addr = $args->read('address');
						$sexe = $args->read('Sexe');
						$date = $args->read('year').'-'.$args->read('month').'-'.$args->read('day');
						$user = UserModel::create($login,$password,$nom,$prenom,$addr,$date,$sexe,$question,$reponse);
                        $view = new CreationView($this);
                        $view->render();
                    }
                }    
            }
        }
		
		
/*################################################################################################################
										Partie connexion
##################################################################################################################*/


		public function connexion($requestArg) {	//on clique sur login
			$view = new ConnexionView($this);  
			$view->render(); 
		}
		
		public function validateConnexion($args) {	//La connexion est réussie !
	
			if(isset($_POST['creationCompte'])){	//on a cliqué sur créationCompte
				header('Location: index.php?controller=Anonymous&action=inscription');
			}
	
			if(isset($_POST['mdpOublie'])){	//on a cliqué sur mdpOublié
				header('Location: index.php?controller=Anonymous&action=mdp'); 
			}
			$login = $args->read('connLogin');	
			$password = $args->read('connPassword');
			if(UserModel::tentativeDeConnexion($login,$password)){
				$id = UserModel::getId($login);
				header('Location: index.php?controller=User&idUser='.$id);
				//A : on est a présent connecté, l'interface doit changer
				session_start();
				$_SESSION['login'] = $login;
			}
			else {
				$view = new ErreurConnexionView($this,'connexion');
				$view->setArg('inscErrorText', 'Erreur de mail/password');
				$view->render();	
			}
		}
/*################################################################################################################
										Partie Recupération de mdp
##################################################################################################################*/	
	
		public function mdp($requestArg) {
			$view = new MdpOublieView($this);  
			$view->render(); 
		}
		
		public function mdpOublie($requestArg) {	//on veut récupérer notre mdp dans la base de donnée (mot de passe oublié)
			$mail = $requestArg->read('loginType');
			if($mail==NULL) {
				$view = new  VideRecuperationMdpOublieView($this);
				$view->render();
			}
			else 
				header('Location: index.php?controller=Anonymous&action=recupQ&mail='.$mail);	//on stocke dans l'url l'email entré
		}

		public function recupQ($arg) {	//on veut récupérer notre mdp dans la base de donnée (mot de passe oublié)
			$view = new RecuperationQuestionView($this); 
			$view->render();
		}		
				
		public function recupQuestion($requestArg){	
			$mail= UserModel::get_Mail();
		
			$reponse = $requestArg->read('reponseType');
			if($reponse==NULL) {
				$view = new  VideRecuperationMdpOublieView($this);
				$view->render();
			}
			else 
				header('Location: index.php?controller=Anonymous&action=recupMdp&mail='.$mail.'&reponse='.$reponse);
		}
		
		
		public function recupMdp(){
			$view = new RecuperationMdpOublieView($this); 
			$view->render();
		}
		
/*################################################################################################################
										Partie Evenements
##################################################################################################################*/
		
		public function eventListDiv(){
			$view = new AnonymousEventListView($this);
			$view->render();
		}
		
		public function eventShow(){
			$view = new AnonymousEventView($this); //la vue eventShow est commune aux ano et users => non car problème dans la barre du haut
			$view->render();
		}
		
		public function anonymousParticiper(){
			$ide = EventModel::get_Id();
			EventModel::setNb_Anonymes($ide);
			$view = new AnonymousEventInscriptionView($this);
			$view->render();

		}
		
		public function developpeuses(){
			$view = new AnonymousDeveloppeusesView($this);
			$view->render();
		}	
	}

?>
