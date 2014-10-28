<?php
require_once 'bdd.php';
require_once 'Article.class.php';
require_once 'ArticleManager.class.php';

$manager = new ArticleManager($DB);
$article = $manager-> getArticle(1);
// $manager-> addArticle($article);
$manager-> updateArticle($article);
 
// $article = $manager-> getAllArticles();
debug($article);