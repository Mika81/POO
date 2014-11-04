<?php
#   framework_const.php
    //print '<pre>' . print $_SERVER . print '</pre>';
    define('BASE_PATH', $_SERVER['DOCUMENT_ROOT'].str_replace('index.php', '', $_SERVER['PHP_SELF']));
    define('BASE_URL', 'http://'.$_SERVER['HTTP_HOST'].str_replace('index.php', '', $_SERVER['PHP_SELF']));
    
//    print '<pre>' . print BASE_PATH . print '</pre>';
//    print '<pre>' . print BASE_URL . print '</pre>';