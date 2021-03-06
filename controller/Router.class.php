<?php
##  controller/Router.class.php

  #doc
  #  classname:  Router
  #  scope:    PUBLIC
  #
  #/doc
  
  class Router {
  
    #  Constructor
    function __construct($queries) {
			$this->hydrate($queries);
    }
    
    private function hydrate(array $data) {
      if(empty($data)) {
        $data = array(
          'application' => 'article',
          'action' => 'list',
          'page' => 1,
        );
      }
			foreach($data as $key => $value) {
				$method = 'set'.ucfirst($key);
				if(method_exists($this, $method)) {
					$this->$method($value);
				}
			}
		}
  
    #   ATTRIBUTES
    private $_application;
    private $_action;
    private $_id;
    private $_page;
    
    #   GETTERS
		
		public function getApplication() { return $this->_application; }
		public function getAction() { return $this->_action; }
		public function getId() { return $this->_id; }
		public function getPage() { return $this->_page; }
    
    #   SETTERS
		
		public function setApplication($application) {
			$this->_application = htmlspecialchars($application);
		}
		
		public function setAction($action) {
			$this->_action = htmlspecialchars($action);
		}
		
		public function setId($id) {
			$id = (int) $id;
			if($id >= 1 && strlen($id) <= 4) {
  			$this->_id = htmlspecialchars($id);
  		}
  	}
		
		public function setPage($page) {
			$page = (int) $page;
			if($page >= 1 && strlen($page) <= 2) {
  			$this->_page = htmlspecialchars($page);
  		}
  	}
  	
  }
