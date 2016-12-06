<?php 
	class ErreurConnexionView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_erreur');
			$this->loadTemplate('content_login');
			$this->loadTemplate('foot');
		}
			
	}
?>