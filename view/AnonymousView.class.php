<?php
	class AnonymousView extends View {
		
		public function __construct(){
			
		}
		
		public function render() { 
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_anonymous');
			$this->loadTemplate('foot');
		}
		
				
	
	}
?>