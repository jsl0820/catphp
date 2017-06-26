<?php 
namespace Library\FormWorker\Route;
// use Library\FormWorker\String;

class Route {

	public $urlInfo;

	public $get;

	public $post;

	public $path;

	public function __construct()
	{
		$this->path = $_SERVER['PHP_SELF'];
		echo $this->path;
	}

	public function post(){
		return $_POST[$key];
	}

	public function get()
	{	
		echo '11';
	}


	public function input()
	{	

	}

	public function getUrlInfo()
	{

	}
}


 ?>
}
