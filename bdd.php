<?php
/* Connexion BDD */
try{
    $DB = new PDO('mysql:host=localhost;dbname=aston','root', 'root');
} catch (Exception $e) {
    die('Erreur : '. $e->getMessage());
}



/* Création fonction debug */
function debug($arg){
    print"<pre>";
        print_r($arg);
    print"</pre>";
}