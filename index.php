<?php
require_once 'bdd.php';
require_once 'Article.class.php';
require_once 'ArticleManager.class.php';

$manager = new ArticleManager($DB);
$article = $manager-> getArticle(2);

debug($article);