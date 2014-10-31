<?php
	##  view/article/form.tpl.php
 ?>
<form method="POST">
<?php if($form_type != 'delete') : ?>
  <?php if($form_type == 'create') : ?>
    <h2>Ajouter un article</h2>
  <?php elseif($form_type == 'edit') : ?>
    <h2>Modification de l'article "<em><?php print $article->getTitle(); ?></em>"</h2>
  <?php endif; ?>
    <div class="form-group">
      <label for="title">Titre de l'article</label>
      <input type="text" name="title" class="form-control" id="title" value="<?php print $article->getTitle(); ?>" required/>
    </div>
    <div class="form-group">
      <label>Visuel</label>
      <input type="file" name="image" />
    </div>
    <div class="form-group">
      <label for="message">Corps de texte</label>
      <textarea name="message" class="form-control" rows="10" id="message"><?php print $article->getMessage(); ?></textarea>
    </div>
    <div class="form-group">
      <label>Publication</label>
      <input type="checkbox" name="published" class="checkbox" <?php if($published_value) { print $published_value; } ?>>
    </div>
  <?php else : ?>
    <p class="list-group-item list-group-item-danger">Êtes-vous sûr(e) de vouloir supprimer l'article "<?php print $article->getTitle(); ?>" ?</p>
  <?php endif; ?>
  <div class="form-group">
  <?php if($form_type == 'delete') : ?>
    <a href="<?php print BASE_URL; ?>" class="btn btn-success btn-lg">Annuler</a>
  <?php endif; ?>
    <input type="submit" name="<?php print $form_type; ?>" class="btn btn-<?php print $submit_class; ?> btn-lg" value="<?php print $submit_value; ?>"/>
  </div>
</form>
