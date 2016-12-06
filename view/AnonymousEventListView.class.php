<?php 		
	class AnonymousEventListView extends View {
		
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_anonymousEventList');	
			$this->loadTemplate('foot');
		}
	}
	
?>