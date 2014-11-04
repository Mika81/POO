<?php

##  model/user/User.class.php
#doc
#  classname:  User
#  scope:    PUBLIC
#
  #/doc

class User {

    private $_id_user;
    private $_pseudo;
    private $_pwd;
    private $_email;
    private $_role;

    function __construct(array $data) {
        $this->hydrate($data);
    }

    private function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    //	GETTERS

    public function getId_user() {
        return $this->_id_user;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getPwd() {
        return $this->_pwd;
    }

    public function getEmail() {
        return $this->_email;
    }

    public function getRole() {
        return $this->_role;
    }

    //	SETTERS

    public function setId_user($id) {
        $id = (int) $id;
        if ($id >= 1 && strlen($id) <= 4) {
            $this->_id_user = $id;
        }
    }

    public function setPseudo($pseudo) {
        if (strlen($pseudo) <= 255 && is_string($pseudo)) {
            $this->_pseudo = $pseudo;
        }
    }

    public function setPwd($pwd) {
        $this->_pwd = hash('sha512', $pwd);
    }

    public function setEmail($email) {
        if (strlen($email) <= 25 && is_string($email)) {
            $this->_email = $email;
        }
    }

    public function setRole($role) {
        if (strlen($role) <= 255 && is_string($role)) {
            $this->_role = $role;
        }
    }

}
