<?php
	##  view/pagination.tpl.php
 ?>
<div id="pagination">
  <ul class="clearfix">
    <?php if($page != 1) : ?>
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=list&page=1" class="btn btn-primary btn-lg">Première</a></li>
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=list&page=<?php print $page-1; ?>" class="btn btn-primary btn-lg">&nbsp;<<&nbsp;</a></li>
    <?php endif;?>            
    <?php for($i = 1; $i <= $pages_nb; $i++) : ?>
      <?php $link_attributes = $i != $page ? 'href="'.BASE_URL.'?application=article&action=list&page='.$i.'" class="btn btn-primary btn-lg"' : 'class="btn btn-default btn-lg"'; ?>
      <li class="pull-left"><a <?php print $link_attributes; ?>><?php print $i; ?></a></li>
    <?php endfor; ?>            
    <?php if($page != $pages_nb) : ?>
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=list&page=<?php print $page+1; ?>" class="btn btn-primary btn-lg">&nbsp;>>&nbsp;</a></li>
      <li class="pull-left"><a href="<?php print BASE_URL; ?>?application=article&action=list&page=<?php print $pages_nb; ?>" class="btn btn-primary btn-lg">Dernière</a></li>
    <?php endif;?> 
  </ul>
</div>
