<?php 		
	class MdpOublieView extends View {

		public function render(){  //formulaire de réccup
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_mdpOublie');
			$this->loadTemplate('foot');
		
		}
		
	}
	
?>