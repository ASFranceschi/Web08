<?php 
	class ErreurModificationProfilView extends View {

		public function render(){ 
			$this->loadTemplate('head');
			$this->loadTemplate('header_connected');
			$this->loadTemplate('content_erreur');
			$this->loadTemplate('content_userModifierProfil');
			$this->loadTemplate('foot');
		}
			
	}
?>