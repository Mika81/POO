<?php

#doc
#   classname:  ArticleManager
#   scope:      PUBLIC
#/doc

class ArticleManager{
    private $_db;
    
    /* Constructor */
    public function __construct ($DB){
        $this-> setDb($DB);
    }
    
    /* Setter */
    /* Les arguments servent à vérifier que $DB est un élément de la classe PDO */
    public function setDb (PDO $DB){
        $this-> _db = $DB;
    }
    
    public function getArticle($id){
        /* On force le typage de $id */
        $id = (int) $id;
        /* $this->_db représente $DB dans l'exo précédent(PHP procédural) */
        $ARTICLE = $this->_db->prepare('SELECT * '
                . 'FROM article '
                . 'WHERE id_article=:id');
        $ARTICLE->bindValue(':id', $id);
        $ARTICLE->execute();
        /* On utilise un filtre PDO FETCH_ASSOC: la méthode de récupération
         *  doit retourner chaque ligne dans un tableau indexé par les noms des colonnes*/
        $result = $ARTICLE->fetch(PDO::FETCH_ASSOC);
        $ARTICLE->closeCursor();
        return new Article($result);
    }
    
    public function addArticle(Article $article) {
        $ADD_ARTICLE = $this->_db->prepare('INSERT INTO article '
                . 'SET title=:title, id_user=:id_user, date=NOW(), image=:image, '
                . 'message=:message');
	$ADD_ARTICLE->execute(array(
            ':title' => htmlspecialchars($article->getTitle()),
            ':message' => htmlspecialchars($article->getMessage()),
	));
        $ADD_ARTICLE->bindParam(':title', $article->getTitle());
	$ADD_ARTICLE->closeCursor();
	}
    
    public function updateArticle(Article $article) {
        $UP_ARTICLE = $this->_db->prepare('UPDATE article '
                . 'SET title=:title, id_user=:id_user, image=:image, message=:message '
                . 'WHERE id=:id');
	$UP_ARTICLE->bindValue(':id', $article->getId());
	$UP_ARTICLE->bindValue(':title', $article->getTitle());
	$UP_ARTICLE->bindValue(':id_user', $article->getId_user());
	$UP_ARTICLE->bindValue(':image', $article->getImage());
	$UP_ARTICLE->bindValue(':message', $article->getMessage());
	
	$UP_ARTICLE->execute();
	$UP_ARTICLE->closeCursor();
	}
    
    public function deleteArticle($id){
        $id = (int) $id;
        $ARTICLE = $this->_db->prepare('DELETE * '
                . 'FROM article '
                . 'WHERE id=:id');
        $ARTICLE->bindValue(':id', $id);
        $ARTICLE->execute();
	$UP_ARTICLE->closeCursor();
        print "Article supprimé";
    }
}