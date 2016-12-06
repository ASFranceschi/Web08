<?php
	abstract class Controller extends MyObject {
		//private $controllerName;
		private $requestController;
		private $actionController;
	
		public function __construct($request){
			$this->controllerName = $request->getControllerName(); //permet de récupérer le nom du controller
			$this->requestController = $request;
		}
		
		public abstract function defaultAction($request);		//meth abstraite
		
		public function execute(){
			$actionController = $this->requestController->getActionName(); //String valant par défaut defaultAction
			//echo "<br>$actionController<br>";
			$this->$actionController($this->requestController); //methode à implémenter dans les sous-classes
		}
	}
?>