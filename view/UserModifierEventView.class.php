<?php 		
	class UserModifierEventView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userModifierEvent');
			$this->loadTemplate('foot');
		}
	}
	
?>