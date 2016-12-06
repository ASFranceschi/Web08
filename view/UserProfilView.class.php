<?php 		
	class UserProfilView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userProfil');
			$this->loadTemplate('foot');
		}
	}
	
?>