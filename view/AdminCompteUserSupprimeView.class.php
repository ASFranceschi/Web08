<?php 		
	class AdminCompteUserSupprimeView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_adminCompteUserSupprime');
			$this->loadTemplate('content_admin');
			$this->loadTemplate('foot');
		}
	}
	
?>