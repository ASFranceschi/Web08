<?php 		
	class AnonymousEventView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_anonymousEvent');
			$this->loadTemplate('foot');
		}
	}
	
?>