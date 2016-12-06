<?php 		
	class UserEventListView extends UserView {
	
	//réécriture de la methode
		
		public function render(){  //on charge des templates connected
			$this->loadTemplate('content_Event_Inscription');
		}
	}
	
?>