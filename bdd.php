<?php
/* Connexion BDD */
try{
    $DB = new PDO('mysql:host=localhost;dbname=aston','root', 'root');
} catch (Exception $e) {
    die('Erreur : '. $e->getMessage());
}
?>
