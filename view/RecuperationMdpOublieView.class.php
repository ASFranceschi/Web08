<?php 		
	class RecuperationMdpOublieView extends View {

		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_recuperationMdpOublie');
			$this->loadTemplate('foot');
		}
	}
?>