<?php
	// Load my root class
	require_once(__ROOT_DIR . '/classes/MyObject.class.php');

	class AutoLoader extends MyObject {
	
		public function __construct() { 
			spl_autoload_register(array($this, 'load'));   	//Des que le nom est pas compris il fait load(nom);
		}
	
	// This method will be automatically executed by PHP whenever it encounters 
	// an unknown class name in the source code 
		private function load($className) {				//charge la classe ClassName si non chargée
			$chemin = array('/model/','/classes/','/controller/','/view/');
			$i = 0;
			
			do{			//plus efficace que le foreach
				$nom = __ROOT_DIR . $chemin[$i].ucfirst($className).'.class.php';
				$i++;
			}
			while(!is_readable($nom)&&($i<count($chemin)));
			if (!is_readable($nom)) {
				throw new Exception("Classe inconnue : ".ucfirst($className));
			}
			
			//echo "<p>Loading: $nom</p>"; //pour voir quels fichiers sont chargés
			require_once($nom);
			
			//code pas sur
			if(strlen(strstr($nom, '/model/'))>0){
				//on load une class model --> essai des requetes sql
				$sqlFileToLoad = __ROOT_DIR . '/sql/'.ucfirst($className);
			}
			/*if (is_readable($sqlNom)){
				require_once($sqlNom);
				$this->log(__CLASS__) //pas fini
			}*/
		}	
	} 
	//fin classe
	$__LOADER = new AutoLoader(); 	
?>