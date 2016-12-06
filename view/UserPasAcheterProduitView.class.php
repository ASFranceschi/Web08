<?php 		
	class UserPasAcheterProduitView extends View {

		
		public function render(){  //on va se connecter : formulaire de connexion
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userPasAcheterProduit');
			$this->loadTemplate('foot');
		}
		
		
	}
	
?>