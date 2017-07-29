<?php 
//助手函数
function asset(){
 	echo 'function asset';
 	echo __DIR__;
}

function dd($var){
	echo '<pre>';
	var_dump($var);
	echo '</pre>';
	exit();
}	
 ?>
