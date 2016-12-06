<?php
	class Request extends MyObject {
		
		//champs
		protected static $myRequest  = NULL;
		private $controllerName;
		private $actionName;
	
		//fonctions
		public static function getCurrentRequest(){
			if (Request::$myRequest == NULL){		//Si on a pas de objet requete
				Request::$myRequest = new Request();
			}
			return Request::$myRequest;
		}
		
		/*public function __construct(){
			$this->controllerName = 'Anonymous';
			//...
		}
		*/
		  
		public function getControllerName(){
			if(isset($_GET["controller"])){
				$controllerName = $_GET["controller"];
			}
			else $controllerName = 'Anonymous';
			return $controllerName;
		}
		
		public function getActionName (){
			if(isset($_GET["action"])){
				$actionName = $_GET["action"];
			}
			else
				$actionName = 'defaultAction';
			return $actionName;
		}
		
		public function setControllerName($controller){
			$_GET["controller"] = $controller ;
		}
		
		public function setActionName($action){
			$_GET["action"] = $action;
		}
		
		public function read($text){
			//permet de lire les champs rentrés dans inscriptionTemplate
			if(isset($_POST[$text]))
				return $_POST[$text];
		}
		
		public function write($get, $valeur){	//permet de changer les champs de l'URL
			$_GET[$get]=$valeur;				//ne marche pas : pas de changement dans l'url
		}
			
	}
?>