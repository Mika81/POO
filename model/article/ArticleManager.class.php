<?php

#doc
#  classname:  ArticleManager
#  scope:    PUBLIC
#
  #/doc

class ArticleManager {

    private $_db;

    #  Constructor

    function __construct($db) {
        $this->setDb($db);
    }

    public function setDb(PDO $db) {
        $this->_db = $db;
    }

    public function getArticle($id) {
        require_once BASE_PATH . 'model/user/User.class.php';
        $id = (int) $id;
        if ($id >= 1 && strlen($id) <= 4) {
            $GET_ARTICLE = $this->_db->prepare('
          SELECT article.id_article, article.title, article.id_user, article.image, article.message, DATE_FORMAT(article.date, \'%d/%m/%Y\') AS date, article.published,
          user.pseudo
          FROM article
          JOIN user
          ON user.id_user = article.id_user
          WHERE id_article=:id');
            $GET_ARTICLE->bindValue(':id', $id);
            $GET_ARTICLE->execute();
            $result = $GET_ARTICLE->fetch(PDO::FETCH_ASSOC);
            $article_raw = new Article($result);
            $user = new User($result);
            $article = array('article' => $article_raw, 'user' => $user);
            $GET_ARTICLE->closeCursor();
            return $article;
        }
    }

    public function createArticle(Article $article) {
        $ADD_ARTICLE = $this->_db->prepare('INSERT INTO article SET title=:title, id_user=:auteur, image=:image, message=:message, date=NOW(), published=:published');
        $ADD_ARTICLE->bindValue(':title', $article->getTitle());
        $ADD_ARTICLE->bindValue(':auteur', $article->getId_user());
        $ADD_ARTICLE->bindValue(':image', $article->getImage());
        $ADD_ARTICLE->bindValue(':message', $article->getMessage());
        $ADD_ARTICLE->bindValue(':published', (int) $article->getPublished());
        $ADD_ARTICLE->execute();
        $ADD_ARTICLE->closeCursor();
    }

    public function getAllArticles($page) {
        require_once BASE_PATH . 'model/user/User.class.php';
        $sql = '
        SELECT article.id_article, article.title, article.id_user, article.message,
        user.pseudo, user.email
        FROM article
        JOIN user
        ON user.id_user = article.id_user
        ORDER BY date ASC
        LIMIT :org, 5
      ';
        $sql .=!empty($_SESSION) && $_SESSION['role'] == 'anonymous' ? 'WHERE published = 1' : NULL;
        $GET_ALL_ARTICLES = $this->_db->prepare($sql);
        $GET_ALL_ARTICLES->bindValue(':org', (int) ($page - 1) * 5, PDO::PARAM_INT);
        $GET_ALL_ARTICLES->execute();
        foreach ($results = $GET_ALL_ARTICLES->fetchAll(PDO::FETCH_ASSOC) as $result) {
            $article = new Article($result);
            $user = new User($result);
            $articles[$article->getId_article()] = array('article' => $article, 'user' => $user);
        }
        $GET_ALL_ARTICLES->closeCursor();
        if (!empty($articles)) {
            return $articles;
        }
    }

    public function getArticlesCount() {
        $GET_ART_COUNT = $this->_db->query('SELECT COUNT(id_article) FROM article');
        return $GET_ART_COUNT->fetchColumn();
    }

    public function editArticle(Article $article) {
        $UP_ARTICLE = $this->_db->prepare('UPDATE article SET title=:title, image=:image, message=:message, published=:published WHERE id_article=:id_article');
        $UP_ARTICLE->bindValue(':id_article', $article->getId_article());
        $UP_ARTICLE->bindValue(':title', $article->getTitle());
        $UP_ARTICLE->bindValue(':image', $article->getImage());
        $UP_ARTICLE->bindValue(':message', $article->getMessage());
        $UP_ARTICLE->bindValue(':published', (int) $article->getPublished());
        $UP_ARTICLE->execute();
        $UP_ARTICLE->closeCursor();
    }

    public function deleteArticle($id) {
        $id = (int) $id;
        if ($id >= 1 && strlen($id) <= 4) {
            $DELETE_ARTICLE = $this->_db->prepare('DELETE FROM article WHERE id_article=:id');
            $DELETE_ARTICLE->bindValue(':id', $id);
            $DELETE_ARTICLE->execute();
            $DELETE_ARTICLE->closeCursor();
        }
    }

    public function searchArticles($search){
        require_once BASE_PATH.'model/user/User.class.php';
        $query = $this-> _db->prepare('SELECT article.id_article, article.title, article.message, article.id_user, user.pseudo '
                . 'FROM article '
                . 'JOIN user '
                . 'ON user.id_user = article.id_user '
                . 'WHERE (article.title LIKE :search OR article.message LIKE :search)');
        $query->bindValue(':search', '%'.$search.'%');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        foreach($results as $result){
            $article = new Article($result);
            $user = new User($result);
            $articles[$article->getId_article()] = array('article' => $article, 'user'=> $user);
        }
        if(!empty($articles)){
            return $articles;
        }        
    }
}
