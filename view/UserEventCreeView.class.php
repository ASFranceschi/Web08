<?php 
	class UserEventCreeView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventCreationValidee');
			$this->loadTemplate('foot');
		}
			
	}
?>