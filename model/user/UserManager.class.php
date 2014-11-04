<?php
## model/user/UserManager.class.php

#doc
#  classname:  UserManager
#  scope:    PUBLIC
#
  #/doc

class UserManager {

    private $_db;

    #  Constructor

    function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function userExists(User $user) {
        // require_once BASE_PATH . 'model/user/User.class.php';
        $query = $this->_db->prepare('SELECT * '
                . 'FROM user '
                . 'WHERE pseudo=:pseudo '
                . 'AND pwd=:pwd');
            $query->bindValue(':pseudo', $user->getPseudo());
            $query->bindValue(':pwd', $user->getPwd());
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $query->closeCursor();
            if(!empty($user)){
                return new User($user);
            }
    }
    
    public function allUsers(){
        $query = $this->_db->prepare('SELECT * '
                . 'FROM user');
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        // debug($users);
        $query->closeCursor();
        if(!empty($result)){
            foreach($result as $user){
                $users[]= new User($user);
            }
            return $users;
        }else{
            $users="Pas d'utilisateurs enregistrés";
        }
    }

}
