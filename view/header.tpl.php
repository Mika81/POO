<?php
##  view/header.tpl.php
?>
<header id="main-header" class="clearfix">
    <div class="navbar navbar-default">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <img src="img/cd.png" id="logo" alt="cd"/>
            <a class="navbar-brand" href="#">Mon Site</a>
        </div>
        <div class="navbar-collapse collapse navbar-responsive-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php print BASE_URL; ?>">Articles</a></li>
                <?php if (!empty($_SESSION['role'])) : ?>
                    <li class="pull-left"><a href="?application=user&action=account">Mon compte</a></li>
                    <li class="pull-left"><a href="?application=user&action=list">liste</a></li>
                <?php endif; ?>
                <li><a href="<?php print BASE_URL.'?application=article&action=create'; ?>">Créer articles</a></li>
            </ul>
            <form action="?application=article&action=search" method="POST" class="navbar-form navbar-left pull-right">
                <input type="text" class="form-control col-lg-8" name="search" placeholder="Saisissez un mot...">
            </form>
        </div>
    </div>
    <div class="pull-right connect">
        <?php if (empty($_SESSION)) : ?>
            <div id="login-form">
                <form action="?application=user&action=connect" method="POST">
                    <div class="form-group clearfix">
                        <input type="text" name="pseudo" placeholder="Pseudo" class="form-control" />
                        <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" />
                        <input type="submit" class="btn btn-default pull-right" value="Se connecter"/>
                    </div>
                </form>
            </div>
        <?php else : ?>
            <div class="alert alert-info">Bonjour <?php print $_SESSION['pseudo']; ?> ! <a href="?application=user&action=disconnect">Déconnexion</a></div>
        <?php endif; ?>
    </div>
</header>
