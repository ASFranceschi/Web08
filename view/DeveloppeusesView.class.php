<?php 
	class DeveloppeusesView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_developpeuses');
			$this->loadTemplate('foot');
		}
			
	}
?>