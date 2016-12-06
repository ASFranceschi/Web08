<?php
	class Model extends DatabasePDO {
		
		
		protected static function db(){
		return DatabasePDO::getCurrentObject();
		}
	}
	
?>