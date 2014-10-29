<?php
##  controller/article/ArticleController.class.php

# On importe la classe de l'application Article
require_once BASE_PATH.'model/article/Article.class.php';

  #doc
  #  classname:  ControllerArticle
  #  scope:    PUBLIC
  #
  #/doc
  
  class ArticleController extends Controller {
    
    #  Constructor
    function __construct() {
      #    Please implement the mandatory following code in each of your Application's Controller
      /* On appel le constructeur parent pour implémenter l'héritage du parent
       *  dans la class enfant */  
      parent::__construct();
      $action = $this->getAppMethod();
      $this->$action(array('id' => $this->getRouter()->getId(), 'page' => $this->getRouter()->getPage()));
    }
    
    
    public function voirIndex($param) {
      $article_array = $this->getAppManager()->getArticle($param['id']);
      $article = $article_array['article'];
      $user = $article_array['user'];
      include(BASE_PATH.'view/article/article.tpl.php');
    }
    
    public function listIndex($param) {
      $articles = $this->getAppManager()->getAllArticles($param['page']);
      $page = $param['page'];
      if(!empty($articles)) {
        foreach($articles as $article_array) {
          $article = $article_array['article'];
          $user = $article_array['user'];
          include(BASE_PATH.'view/article/article-teaser.tpl.php');
        }
      }
      $pages_nb = ceil($this->getAppManager()->getArticlesCount()/5);
      if($pages_nb > 1) {
        include(BASE_PATH.'view/pagination.tpl.php');
      }
    }
    
    public function createIndex() {
//        print "bibi";
      if(empty($_POST)) {
        $article = new Article($_POST);
        $form_type = $this->getRouter()->getAction();
        $published_value = NULL;
        include_once(BASE_PATH.'view/article/form.tpl.php');
      }else{
        $article = new Article($_POST);
        # On donne une valeur à l'id user
//        $article->setId_user($_SESSION['id']);
        $article->setId_user(1);
        # On va chercher la méthode 'createArticle' 
        $this->getAppManager()->createArticle($article);
//        header('Location: '.BASE_URL);
          debug($article);
          debug($_POST);
      }
    }
    
    public function editIndex($param) {
      if(empty($_POST)) {
        $article = $this->getAppManager()->getArticle($param['id']);
//        $article = $article_array['article'];
        $published_value = $article->getPublished() ? 'checked' : NULL;
        $form_type = $this->getRouter()->getAction();
        $submit_value = 'Modifier';
        include_once(BASE_PATH.'view/article/form.tpl.php');
      }
      else {
//        $_POST['published'] = isset($_POST['published']) ? $_POST['published'] : FALSE;
        $article = new Article($_POST);
        $article->setId_article($param['id']);
        $this->getAppManager()->editArticle($article);
        header('Location: '.BASE_URL.'?application=article&action=voir&id='.$article->getId_article());
      }
    }
    
    public function deleteIndex($param) {
      if(empty($_POST)) {
        $article_array = $this->getAppManager()->getArticle($param['id']);
        $article = $article_array['article'];
        $form_type = $this->getRouter()->getAction();
        include(BASE_PATH.'view/article/form.tpl.php');
      }
      else {
        $this->getAppManager()->deleteArticle($param['id']);
        header('Location: '.BASE_PATH);
      }
    }
    
    public function searchIndex($param) {
      if(!empty($_POST)) {
        $search = $_POST['search'];
        $articles = $this->getAppManager()->searchArticles($search);
        if(!empty($articles)) {
          foreach($articles as $article_array) {
            $article = $article_array['article'];
            $user = $article_array['user'];
            include(BASE_PATH.'view/article/article-teaser.tpl.php');
          }
        }
      }
    }
    
  }
