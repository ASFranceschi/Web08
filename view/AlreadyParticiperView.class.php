<?php 
	class AlreadyParticipeView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_userAlreadyParticiper');
			$this->loadTemplate('foot');
		}
			
	}
?>