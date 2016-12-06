<?php 		
	class UserEventGererListView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userEventGererList');
			$this->loadTemplate('foot');
		}
	}
	
?>