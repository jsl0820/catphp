<?php 
/**
 * Catphp - A Simple MVC Web Framework
 * Version - 0.0.0
 * 
 * @author JaveLin < 1154686922@qq.com >
 */

// 定义应用根目录
define('CAT_ROOT', __DIR__);
// 注册PSR-4
require  __DIR__.'/vendor/autoload.php';
// 实例化app
$app = \Cat\App::start();
// 开始！
$app->run();
