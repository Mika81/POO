<?php

/* Simulation de variable $_POST */
$post = array(
    'title' => 'Mon titre',
    'id_user' => '3',
    'message' => 'mon nouvel article...',
);

$article2 = new Article($post);
print $article2-> getTitle();