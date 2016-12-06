<?php 		
	class AnonymousEventInscriptionView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_anonymousEventInscription');
			$this->loadTemplate('foot');
		}
	}
	
?>