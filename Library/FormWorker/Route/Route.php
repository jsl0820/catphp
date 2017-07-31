<?php 
namespace Library\FormWorker\Route;
// use Library\FormWorker\String;

class Route {

	public $pathInfo;
	public $input;

	public function __construct()
	{
		$this->pathInfo = trim($_SERVER['PATH_INFO']);
		$this->input = $this->getRequest();
	}

	public function  getRequest()
	{
		$get = $_GET;
		$post = $_POST;
		return array_merge($get,$post);
	}

}


 ?>
}
