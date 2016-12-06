<?php 		
	class UserView extends View {
	
	public function render(){  //on charge des templates connected
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_connected');
			$this->loadTemplate('foot');
		}
	}
	
?>