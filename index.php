<?php 
define('CAT_ROOT', __DIR__);
require __DIR__.'/vendor/autoload.php';
require __DIR__.'/cat/App.php';
$app = \Cat\App::start();
$app->run();
?>
