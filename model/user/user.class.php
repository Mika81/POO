<?php
##  model/user/user.class.php

#doc
#   classname:  User
#   scope:  PUBLIC
#
#/doc

class user{
    
    #   attributes
    private $_id_user;
    private $_pseudo;
    private $_pwd;
    private $_email;
    private $_role;
    
    #   constructor
    function __construct(array $data){
        $this->hydrate($data);
    }
    
    private function hydrate(array $data){
        foreach($data as $key=>$value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }
    
    #   getters
    public function getId_user() { return $this->_id_user; }
    public function getPseudo() { return $this->_pseudo; }
    public function getPwd() { return $this->_pwd; }
    public function getEmail() { return $this->_email; }
    public function getRole() { return $this->_role; }
    
    #   setters
    public function setId_user($application){
        $this->_application = htmlspecialchars($application);
    }
}
