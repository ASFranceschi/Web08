<?php 		
	class VideRecuperationMdpOublieView extends View {
	
		public function render(){  
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_videRecuperationMdpOublie');
			$this->loadTemplate('content_mdpOublie');
			$this->loadTemplate('foot');
		}
	}
?>