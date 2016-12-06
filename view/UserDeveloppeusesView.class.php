<?php 
	class UserDeveloppeusesView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_developpeuses');
			$this->loadTemplate('foot');
		}
			
	}
?>