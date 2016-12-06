<?php 		
	class UserEventListView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventList');
			$this->loadTemplate('foot');
		}
	}
	
?>