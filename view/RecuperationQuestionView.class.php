<?php 		
	class RecuperationQuestionView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_recuperationQuestion');
			$this->loadTemplate('foot');
		}
	}
?>