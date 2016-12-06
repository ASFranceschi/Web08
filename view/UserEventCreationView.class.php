<?php 		
	class UserEventCreationView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_eventCreation');
			$this->loadTemplate('foot');
		}
			
	}
?>