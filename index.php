<?php
/* Déclarer une classe */

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
    
    /* les Getters - On appel l'attribut pour en afficher la valeur */
    public function getTitle() { return $this -> _title; }
    public function getId_user() { return $this -> _id_user; }
    public function getDate() { return $this -> _date; }
    public function getImage() { return $this -> _image; }
    public function getMessage() { return $this -> _message; }
    public function getPublished() { return $this -> _published; }
    
    /* les Setters - On donne une valeur à l'attribut */
    public function setTitle($value) { $this -> _titre = $value; }
    public function setId_user($value) { $this -> _id_user = $value; }
    public function setDate($value) { $this -> _date = $value; }
    public function setImage($value) { $this -> _image = $value; }
    public function setMessage($value) { $this -> _message = $value; }
    public function setPublished($value) { $this -> _published = $value; }
}

/* On instancie la class Artilce pour en récupérer un objet que l'on nomme $article */
$article = new Article();
$article-> setTitle('Mon titre avec un Setter');
print $article -> getTitle();