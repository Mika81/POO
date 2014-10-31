<?php
  
  #doc
  #  classname:  Article
  #  scope:    PUBLIC
  #
  #/doc
  
  class Article {
    
    private $_id_article;
    private $_title;
    private $_id_user;
    private $_date;
    private $_image;
    private $_message;
    private $_published;
    
    public function __construct(array $data) {
	    $this->hydrate($data);
    }
    
    private function hydrate(array $data) {
      foreach ($data as $key => $value) {
	      $method = 'set'.ucfirst($key);
	      if (method_exists($this, $method)) {
		      $this->$method($value);
	      }
      }
    }

    
    public function getId_article() { return $this->_id_article; }
    public function getTitle() { return $this->_title; }
    public function getId_user() { return $this->_id_user; }    
    public function getDate() { return $this->_date; }    
    public function getImage() { return $this->_image; }    
    public function getMessage() { return $this->_message; }    
    public function getPublished() { return $this->_published; }
    
    public function setId_Article($id)
    {
      $id = (int) $id;
      if(strlen($id) < 6 && $id > 0) {
        $this->_id_article = $id;
      }
    }
    
    public function setTitle($title)
    {
      if(strlen($title) <= 255 && strlen($title) > 3) {
        $this->_title = $title;
      }
    }
    
    public function setId_user($id)
    {
      $id = (int) $id;
      if(strlen($id) < 6 && $id > 0) {
        $this->_id_user = $id;
      }
    }
    
    public function setDate($date)
    {
      $this->_date = $date;
    }
    
    public function setImage($image)
    {
			if(strlen($image) <= 20 && is_string($image)) {
        $this->_image = $image;
      }
    }
    
    public function setMessage($message)
    {
			if(is_string($message)) {
        $this->_message = $message;
      }
    }
    
    public function setPublished($published)
    {
      if($published == 'on' || $published == 1) {
        $this->_published = 1;
      }
      else {
        $this->_published = 0;
      }
    }
    
  }
