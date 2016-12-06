<?php 		
	class UserProduitView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userProduit');
			$this->loadTemplate('foot');
		}
	}
	
?>