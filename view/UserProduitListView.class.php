<?php 		
	class UserProduitListView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_userProduitList');
			$this->loadTemplate('foot');
		}
	}
	
?>