<?php
	class View extends MyObject {
		protected $args;
		protected $templateNames; //tableau de noms de templates
		
		public function __construct($controller, $nomTemplate,$arguments = array()) { //arguments : tableau de paramètres
			parent::__construct(); //constructeur de MyObject
			$this->templateNames = array();
			$this->templateNames['head'] = 'head';
			$this->templateNames['top'] = 'top';
			$this->templateNames['menu'] = 'menu';
			$this->templateNames['foot'] = 'foot';
			$this->templateNames['side'] = 'side';
			$this->templateNames['content'] = $nomTemplate;
			$this->args = $arguments;
			$this->args['controller'] = $controller;
			$this->args['view'] = $this;
		}
		
		public function setArg($key, $val) {
			$this->args[$key] = $val;
		}
		
		public function render() {
			$this->loadTemplate($this->templateNames['head'], $this->args);
			$this->loadTemplate($this->templateNames['top'], $this->args);
			$this->loadTemplate($this->templateNames['menu'], $this->args);
			$this->loadTemplate($this->templateNames['side'], $this->args);
			$this->loadTemplate($this->templateNames['foot'], $this->args);
			$this->loadTemplate($this->templateNames['content'], $this->args);
		}
		
		public function loadTemplate($name,$args=NULL) {
			$templateFileName = __SITE_PATH . '/templates/'. $name . 'Template.php';
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