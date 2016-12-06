<?php 
	class ErreurCreationEventView extends View {

		public function render(){ 
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_erreur');
			$this->loadTemplate('content_eventCreation');
			$this->loadTemplate('foot');
		}
			
	}
?>