<?php
##  controller/user/UserController.class.php

  require_once BASE_PATH.'model/user/User.class.php';

  #doc
  #  classname:  ControllerUser
  #  scope:    PUBLIC
  #
  #/doc
  
  class UserController extends Controller {
    
    #  Constructor
    function __construct() {
      parent::__construct();
      $action = $this->getAppMethod();
      $this->$action(array('id' => $this->getRouter()->getId(), 'page' => $this->getRouter()->getPage()));
    }
    
    public function connectIndex(){
        $user = new User($_POST);
        $user = $this->getAppManager()->userExists($user);
        if(!empty($user)){
            $_SESSION = array(
                'id' => $user->getId_user(),
                'pseudo' => $user->getPseudo(),
                'role' => $user->getRole(),
                'email' => $user->getEmail(),
            );
        }
        header('Location: '.BASE_URL);
    }
    
    public function listIndex(){
        $users = $this->getAppManager()->allUsers();
        //debug($users);
        include_once(BASE_PATH.'view/user/list.tpl.php');
    }
    
    public function disconnectIndex() {
        unset($_SESSION);
        session_destroy();
        header('Location: '.BASE_URL);
        exit();
    }
    
//    public function accountIndex(array $users){
//        $users = $this->getAppManager()->allUsers();
//        if(!empty($users)){
//            foreach($users as $users_array){
//                $pseudo = $users_array['pseudo'];
//                $email = $users_array['email'];
//                $role = $users_array['role'];
//                include(BASE_PATH.'view/user/list.tpl.php');
//            }
//        }
//    }
 }
