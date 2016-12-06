<?php 		
	class UserCompteSupprimeView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_userCompteSupprime');
			$this->loadTemplate('foot');
		}
	}
	
?>