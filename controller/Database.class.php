<?php
## controller/Database.class.php

class Database{
    #   constructor
    function __construct(array $host){
        $this->setConnexion($host);
    }
    
    #   attributes
    private $_connexion;
    
    #   getters
    public function getConnexion() { return $this->_connexion; }
    
     #   setters
    public function setConnexion(array $host){
        try{
            $this->_connexion = new PDO('mysql:host='.$host['hostname'].';'
                    . 'dbname='. $host['db_name'], $host['user_name'], $host['user_pwd']);
        } catch (PDOException $e) {
            print 'Erreur !: '. $e->getMessage() . '<br/>';
            die();
        }
    }
}