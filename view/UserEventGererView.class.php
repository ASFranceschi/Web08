<?php 		
	class UserEventGererView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventGerer');
			$this->loadTemplate('foot');
		}
	}
	
?>