<?php
    ## view/article/form.tpl.php
?>
<h3>Formulaire de création d'articles</h3>
<form id="form2" method="POST">
    <div class="form-group">
        <label for="title">Titre de l'article</label>
        <input type="text" id="title" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="author">Auteur</label>
        <input type="text" id="author" name="author" class="form-control">
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="text" id="date" name="date" class="form-control">
    </div>
    <div class="form-group">
        <label>Visuel</label>
        <input type="file" name="image">
    </div>
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" rows="10"></textarea>
    </div>
    <div class="form-group">
        <label>Publier</label>
        <input type="checkbox" name="dispo" value="dispo" class="checkbox">
    </div>
    <div class="form-group">
        <input type="submit" name="submit" value="Valider" class="btn btn-primary btn-lg">
    </div>
</form>