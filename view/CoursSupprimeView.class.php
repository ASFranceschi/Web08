<?php 		
	class CoursSupprimeView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_adminCoursSupprime');
			
			$this->loadTemplate('foot');
		}
	}
	
?>