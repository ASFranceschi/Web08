<?php 		
	class AdminView extends View {
	
	public function render(){  //on charge des templates admin
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_admin');
			$this->loadTemplate('foot');
		}
	}
	
?>