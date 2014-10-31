<?php
##  view/user.tpl.php
?>
<table class="table table-striped table-hover ">
    <thead>
        <tr>
            <th>#</th>
            <th>Pseudo</th>
            <th>e-mail</th>
            <th>role</th>
        </tr>
    </thead>
    <tbody>
        <?php 
         foreach ($users as $user) : ?>
        <tr>
            <th><?php print $user->getId_user(); ?></th>
            <th><?php print $user->getPseudo(); ?></th>
            <th><?php print $user->getEmail(); ?></th>
            <th><?php print $user->getRole(); ?></th>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tbody>
</table>