<?php 		
	class UserEventInscriptionPayanteView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventInscriptionPayante');
			$this->loadTemplate('foot');
		}
	}
	
?>