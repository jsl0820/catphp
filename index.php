<?php 

//加载自动加载文件
require('./Cat/autoload.php');
//加载全局配置文件
require('./Cat/Config.php');
//加载全局助手函数
require('./Cat/Helper.php');
//run...
$cat = new \Cat\Cat();
$cat->run();
?>
