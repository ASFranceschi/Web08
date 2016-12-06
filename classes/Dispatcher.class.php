<?php
	class Dispatcher extends MyObject {
		private static $myDispatcher = NULL;
		
		public static function dispatch($request){  //appelle une methode ayant le nom du controller et la requete
			return static::dispatchToController($request->getControllerName(), $request); //a pour params une requete et le nom de son controller
		}
		
		public static function dispatchToController($controllerName, $request){
			$controllerClassName = ucfirst($controllerName).'Controller';  //monNomController
			if(!class_exists($controllerClassName)){
				throw new Exception ('Controller inconnu : '.ucfirst($controllerName));
			}
			
			//echo "<b>$controllerClassName</b>";
			return new $controllerClassName($request);
		}
		
		public static function getCurrentDispatcher(){
			if (is_null(self::$myDispatcher)){
				try {
					$myDispatcher= new Dispatcher;
				} 
				catch (Exception $e ){
					die('Erreur de Dispatcher.\n');
				}
			}
			return $myDispatcher;
		}
	}
?>
