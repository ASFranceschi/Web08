<?php 		
	class ConnexionView extends View {

		
		public function render(){  //on va se connecter : formulaire de connexion
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_login');
			$this->loadTemplate('foot');
		}
		
		
	}
	
?>