<?php
    ## view/header.tpl.php
?>
<!-- Start header -->
<header>
    <nav class="navbar navbar-default">
        <img src="images/cd.png" alt="cd" id="logo"/>
        <h1><a class="navbar-brand" href="index.php">Mon titre de site</a></h1>
        <!-- Navigation menu -->
        <ul class="nav navbar-nav">
            <li><a href="#">Tous les articles</a></li>
            <li><a href="?application=article&action=create">Ajouter un article</a></li>
        </ul>
        <!-- End of navigation menu -->
        <!-- Search form -->
        <form method="POST" action="recherche.php" class="navbar-form navbar-left">
            <input type="text" name="search" class="form-control col-lg-8" placeholder="Search"/>
        </form>
        <!-- End of Search form -->
        <a href='deconnexion.php' class='pull-right'>Se déconnecter</a>
        <a href='connexion.php' class='pull-right'>Se connecter</a>
    </nav>
</header>
<div id="page" class="container jumbotron">