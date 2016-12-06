<?php 		
	class CreationView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_creation');
			$this->loadTemplate('foot');
		}
			
	}
?>