<?php 
	function  __autoload($className){
		$class = str_replace('\\', '/', $className);
		$path = $class.'.php';
		if(file_exists($path)){
			include($path);
		}
	}	
 ?>