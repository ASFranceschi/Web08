<?php 		
	class UserEventDesinscriptionView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventDesinscription');
			$this->loadTemplate('foot');
		}
	}
	
?>