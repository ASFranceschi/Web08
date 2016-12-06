<?php 
	class AnonymousDeveloppeusesView extends View {
		
		//pas de constructeurs c'est dans View
		
		//réécriture de la methode
		
		public function render(){  //s'assurer qu'on ne charge pas des templates inutiles
			$this->loadTemplate('head');
			$this->loadTemplate('header_anonymous');
			$this->loadTemplate('content_developpeuses');
			$this->loadTemplate('foot');
		}
			
	}
?>