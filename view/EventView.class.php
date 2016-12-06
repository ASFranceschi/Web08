<?php 		
	class EventView extends View {
	
	//réécriture de la methode
		
		public function render(){  //on charge des templates connected
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('top');
		
			$this->loadTemplate('content_event');
			$this->loadTemplate('foot');
		}
	}
?>