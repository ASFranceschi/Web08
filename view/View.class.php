<?php
	class View extends MyObject {
		protected $args;
		protected $templateNames; //tableau de noms de templates
		
		public function __construct($controller) {
			//parent::__construct(); //constructeur de MyObject attention : pas de constructeur dans MyObject
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			$this->templateNames['header'] = 'header_anonymous';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menu_anonymous';
			$this->templateNames['foot'] = 'foot';
			$this->templateNames['side'] = 'side';
			$this->templateNames['content'] = 'content_anonymous';
			$this->args = array();
			$this->args['controller'] = $controller;
			$this->args['view'] = $this;
			$this->args['inscErrorText'] = NULL;
		}
		
		public function setArg($key, $val) {
			$this->args[$key] = $val;
		}
		
		public function getArg($key) {
			return $this->args[$key];
		}
		
		
		public function render() {
			$this->loadTemplate($this->templateNames['head'], $this->args);
			$this->loadTemplate($this->templateNames['header'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			//$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['side'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args);
		}
		
		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __ROOT_DIR . '/templates/'. $name . 'Template.php';
			//echo "$templateFileName";
			if(is_readable($templateFileName)) {
				if(isset($args))
					foreach($args as $key => $value)
						$$key = $value;
				require_once($templateFileName);
			}
			else
				throw new Exception('undefined template "' . $name .'"');
		}
	}

?>