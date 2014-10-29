<?php
## controller/Controller.class.php

require_once BASE_PATH.'controller/Router.class.php';
require_once BASE_PATH.'controller/Database.class.php';
require_once BASE_PATH.'controller/article/ArticleController.class.php';
// require_once BASE_PATH.'controller/user/UserController.class.php';

#doc
#   classname:  Controller
#   scope:      PUBLIC
#   Please provide each application's controller class for this file
#   
#/doc

class Controller{
    
    #   constructor
    function __construct(){
        $this->setRouter($_GET);
        $this->setDbObject(array('hostname' => 'localhost',
            'db_name' => 'aston', 
            'user_name' => 'root', 
            'user_pwd' => 'root'));
        $this->setAppClass($this->getRouter()->getApplication());
        $this->setAppMethod($this->_appclass, $this->getRouter()->getAction());
        $this->setAppManager($this->_dbObject);
    }

    #   attributes
    private $_router;
    private $_appClass;
    private $_appMethod;
    private $_appManager;
    private $_dbObject;

    #   getters
    public function getRouter() { return $this->_router; }
    public function getAppClass() { return $this->_appClass; }
    public function getAppMethod() { return $this->_appMethod; }
    public function getAppManager() { return $this->_appManager; }
    public function getDbObject() { return $this->_dbObject; }


    #   setters
    public function setRouter(array $queries) { 
        $this->_router = new Router($queries);        
    }
    
    public function setAppClass($class) { 
        $class = ucfirst($class).'Controller';
        if(class_exists($class)){
            $this->_appClass = $class;        
        }else{
            print 'la classe Controller "'. $class .'" n\'existe pas';
        }
    }
    
    public function setAppMethod($class, $method) { 
        $method = $method.'Index';
        if(method_exists($class, $method)){
            $this->_appMethod = $method;  
        }else{
            print 'La méthode "'. $method .'" n\'existe pas dans la classe "'. $class .'"';
        }
    }
    
    public function setAppManager(PDO $db) { 
        $class = ucfirst($this->getRouter()->getApplication()).'Manager';
        require_once BASE_PATH.'model/'.$this->getRouter()->getApplication().'/'.$class.'.class.php';
        if(class_exists($class)){
            $this->_appManager = new $class($db);        
        }else{
            print 'la classe Manager '. $class .' n\'existe pas';
        }
    }
    
    public function setDbObject(array $host) { 
        $db_Object = new Database($host);
        $this->_dbObject = $db_Object-> getConnexion();        
    }
}