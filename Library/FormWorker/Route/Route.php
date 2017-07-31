<?php 
namespace Library\FormWorker\Route;
// use Library\FormWorker\String;

class Route {

	public $pathInfo;

	public $urlInfo;
	public $path;

	public function __construct()
	{	
		$this->pathInfo = $_SERVER['PATH_INFO'];
		$this->path = $_SERVER['PHP_SELF'];
	}

	public function post($key)
	{	
		$post = trim($_POST[$key]);
		return $post;		
	}

	public function get($key)
	{	
		if(!$key){
			$get = trim($_POST[$key]);
		}else{
			$get = $_POST;
		}
		return $get;
	}

	public function test(){
		echo '1234';
	}

}


 ?>
}
