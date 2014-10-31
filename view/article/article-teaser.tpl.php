<?php
	##  view/article/article-teaser.tpl.php
 ?>
<div class="list-row article-<?php print $article->getId_article(); ?>">
  <div class="clearfix">
    <h2 class="pull-left">
      <a href="<?php print BASE_URL; ?>?application=article&action=voir&id=<?php print $article->getId_article(); ?>">
        <span class="glyphicon glyphicon-hd-video"></span>
        <img src="<?php print BASE_URL.'img/article/'.$article->getImage(); ?>" class="img-thumbnail"/>
        <?php print $article->getTitle(); ?>
      </a>
    </h2>
  </div>
  <?php if(isset($_SESSION['role']) && $_SESSION['role'] != 'anonymous') : ?>
  <div id="manage-buttons">
    <ul class="clearfix">
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=edit&id=<?php print $article->getId_article(); ?>" class="btn btn-success      ">Modifier</a></li>
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=delete&id=<?php print $article->getId_article(); ?>" class="btn btn-danger">Supprimer</a></li>
    </ul>
  </div>
  <?php endif; ?>
  <div class="well well-lg">
    <span class="glyphicon glyphicon-info-sign"></span><br />
    <?php
      $message = $article->getMessage();
      if(isset($message) && strlen($message) > 100) {
        $message = substr($message, 0, 100).' <a href="article.php?article_id='.$article->getId_article().'">...</a>';
      }
      print $message;
    ?>
    <div class="pull-right"><span class="glyphicon glyphicon-qrcode"></span>
      Posté par <?php print $user->getPseudo(); ?>
    </div>
  </div>
</div>