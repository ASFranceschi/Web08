<?php 		
	class UserEventView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEvent');
			$this->loadTemplate('foot');
		}
	}
	
?>