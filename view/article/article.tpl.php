<?php
  ##  view/article/article.tpl.php
?>
<section id="content">
  <article class="content-type-article">
    <h2><?php print $article->getTitle(); ?></h2>
    <div class="created">Posté par <?php print $user->getPseudo(); ?> le <?php print $article->getDate(); ?>.</div>
    <?php $image = $article->getImage(); if(isset($image)) : ?>
    <figure>
      <img src="<?php print BASE_URL.'img/article/'.$article->getImage(); ?>" class="img-thumbnail"/>
    </figure>
    <?php endif; ?>
    <div class="article-message">
      <?php print $article->getMessage(); ?>
    </div>
  </article>
</section>
