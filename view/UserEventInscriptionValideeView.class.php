<?php 		
	class UserEventInscriptionValideeView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventInscriptionValidee');
			$this->loadTemplate('foot');
		}
	}
	
?>