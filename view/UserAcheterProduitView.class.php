<?php 		
	class UserAcheterProduitView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userAcheterProduit');
			$this->loadTemplate('foot');
		}
	}
	
?>