<?php
##  index.php

session_start();
require_once('framework_const.php');
require_once BASE_PATH.'controller/Controller.class.php';
$controller = new Controller;
$app_controller = $controller->getAppClass();
# include_once BASE_PATH.'view/html.tpl.php';
new $app_controller;
# include_once BASE_PATH.'view/end_html.tpl.php';