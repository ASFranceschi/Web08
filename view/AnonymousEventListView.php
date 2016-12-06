<?php 		
	class AnonymousEventListView extends View {
	
	//réécriture de la methode
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('top');
			
			//$this->loadTemplate('content_Event_Inscription');
			$this->loadTemplate('content_anonymousEventList');
			
			$this->loadTemplate('foot');
		}
	}
	
?>