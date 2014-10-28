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
    
    public function getAllArticles(){
        $LIST = $this->_db->query('SELECT *, '
                . 'DATE_FORMAT(date, \'%d/%m/%y\') AS date '
                . 'FROM article '
                . 'ORDER BY date '
                . 'DESC');
        /* A chaque fois que la condition est vrai, la boucle while ajoute un item
         * dans le tableau Articles */
        while($list_fetch = $LIST->fetch(PDO::FETCH_ASSOC)){
            $articles[] = new Article($list_fetch);
        }
        return $articles;
        $LIST->closeCursor();
    }
    
    public function addArticle(Article $article) {
        $ADD_ARTICLE = $this->_db->prepare('INSERT INTO article '
                . 'SET title=:title, id_user=:id_user, date=NOW(), image=:image, '
                . 'message=:message, published=:published');
        $ADD_ARTICLE->bindValue(':title', $article->getTitle());
	$ADD_ARTICLE->bindValue(':id_user', $article->getId_user());
	$ADD_ARTICLE->bindValue(':image', $article->getImage());
	$ADD_ARTICLE->bindValue(':message', $article->getMessage());
	$ADD_ARTICLE->bindValue(':message', $article->getMessage());
        $ADD_ARTICLE->bindValue(':published', (int) $article->getPublished() );
	$ADD_ARTICLE->execute();
	$ADD_ARTICLE->closeCursor();
	}
    
    public function updateArticle(Article $article) {
        $UP_ARTICLE = $this->_db->prepare('UPDATE article '
                . 'SET title=22, id_user=:id_user, image=:image, message=:message, '
                . 'published=:published '
                . 'WHERE id_article=:id_article');
	$UP_ARTICLE->bindValue(':id_article', $article->getId_article());
	// $UP_ARTICLE->bindValue(':title', $article->getTitle());
	$UP_ARTICLE->bindValue(':id_user', $article->getId_user());
	$UP_ARTICLE->bindValue(':image', $article->getImage());
	$UP_ARTICLE->bindValue(':message', $article->getMessage());
	$UP_ARTICLE->bindValue(':published', (int) $article->getPublished());
	$UP_ARTICLE->execute();
	$UP_ARTICLE->closeCursor();
	}
    
    public function deleteArticle($id){
        $id = (int) $id;
        $DEL_ARTICLE = $this->_db->prepare('DELETE '
                . 'FROM article '
                . 'WHERE id_article=:id_article');
        $DEL_ARTICLE->bindValue(':id_article', $id);
        $DEL_ARTICLE->execute();
	$DEL_ARTICLE->closeCursor();
        print "Article supprimé";
    }
}