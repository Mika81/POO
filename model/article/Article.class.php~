<?php

#doc
#   classname:  Article
#   scope:      PUBLIC
#/doc

class Article{
    /* Les attributs à l'intérieur d'une classe sont généralement privés,
     *  l'objet est ainsi sécurisé via l'emcapsulation */
    private $_title;
    private $_id_user;
    private $_date;
    private $_image;
    private $_message;
    private $_published;
    private $_id_article;
    
    /* La méthode constructeur se lance automatiquement (méthode magique) 
        Permet de faire appel à des fonctions dans un objet et/ou de l'hydrater  */
    public function __construct(array $data) {
        $this->hydrate($data);
    }
    
    /* Fonction d'hydratation: Permet l'hydratation de notre objet 
     * Peut aussi se mettre dans le constructeur     
     * Permet de donner des valeurs aux attributs d'un objet de facon dynamique     */
    private function hydrate(array $data) {
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            /* method_existe vérifie si la méthode existe dans l'objet
             * Regarde dans l'argument 1 (la class ou l'objet), si l'argument 2 existe,
             * on passe 2 arguments: 
             * $this= correspond à l'objet ou la class dans lequel la méthode est testée
             * $method= le nom de la méthode */
            if(method_exists($this, $method)){
                $this-> $method($value);
            }
        }
    }
    
    /* les Getters - On appel l'attribut pour en afficher la valeur */
    public function getTitle() { return $this-> _title; }
    public function getId_user() { return $this-> _id_user; }
    public function getDate() { return $this-> _date; }
    public function getImage() { return $this-> _image; }
    public function getMessage() { return $this-> _message; }
    public function getPublished() { return $this-> _published; }
    public function getId_article() { return $this-> _id_article; }
    
    /* les Setters - On donne une valeur à l'attribut */
    public function setTitle($value) { 
        if(strlen($value) <= 255 && strlen($value) > 3) {
            $this-> _title = $value;
        }else{
            print '<p>La longueure du titre de l\'article ne doit être comprise entre 3 et 255 caractères</p>';
        }
    }
    
    public function setId_user($value)
    {
      $value = (int) $value;
      if(strlen($value) < 6 && $value > 0) {
        $this->_id_user = $value;
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
    
    public function setMessage($value) { 
        if(is_string($value)){
            $this-> _message = $value;
        }
    }
    
    public function setPublished($value) { 
        if($value == 'on' || $value == 1){
            $this-> _published = $value;
        }else{
            $this-> _published = 0;
        }     
    }
    
    public function setIdArticle($value) {
        if (strlen($value) < 6 && $value > 0){
            $value = (int) $value;
            $this-> _id_user = $value;
        }else{
            print "<p>Mauvais ID !</p>";
        }
    }
}

/* On instancie la class Artilce pour en récupérer un objet que l'on nomme $article */
//$article = new Article();
//$article-> setTitle('Mon titre avec un Setter');
//print $article -> getTitle();
