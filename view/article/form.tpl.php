<?php
    ## view/article/form.tpl.php
?>
<?php if($form_type == 'create') : ?>
<h3>Formulaire de création d'articles</h3>
<?php elseif($form_type == 'edit') : ?>
<h3>Formulaire de modification de l'article "<?php print $article->getTitle(); ?>"</h3>
<?php endif; ?>
<form id="form2" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" id="title" name="title" value='<?php print $article->getTitle(); ?>' class="form-control">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" id="date" name="date" value='<?php print $article->getDate(); ?>' class="form-control">
    </div>
    <div class="form-group">
        <label>Visuel</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" rows="10"><?php print $article->getMessage(); ?></textarea>
    </div>
    <div class="form-group">
        <label>Publier</label>
        <input type="checkbox" name="published" <?php if($article->getPublished()){ print 'checked'; } ?> class="checkbox">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Valider" class="btn btn-primary btn-lg">
    <?php if($form_type == 'delete') : ?>
        <a href='?delete=<?php echo $article->getId_article() ?>' class="btn btn-danger btn-lg pull-right">Supprimer cette fiche</a>
    </div>
    <?php endif; ?>
</form>