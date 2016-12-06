<?php 		
	class UserEventInscriptionView extends View {
	
	//réécriture de la methode
		
		public function render(){  //on charge des templates connected
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('top');
		
			$this->loadTemplate('content_userEventInscription');
			$this->loadTemplate('foot');
		}
	}
	
?>