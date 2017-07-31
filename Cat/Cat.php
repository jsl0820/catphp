<?php
namespace Cat;
use Library\FormWorker\Route\Route;
	
class Cat {

	private static $instance;

	public function __construct()
	{	
		// $controller = new \App\Controller\IndexController();
		// $method = "test";
		$route = new Route();
		$path = $route->pathInfo;
		echo $path;
		
		$tes = new 	$class;
		exit();
		call_user_func([$controller,$method]);
	}


	//获取pathInfo
	public function getPathInfo()
	{

	}

	public function getRequest()
	{
		$route = new Route();
		var_dump($route->get());
	}

	//分发请求
	public function distributeRequert()
	{
		$respone = new Controller();
		$respone->test();
	}

	public function run(){

	}
}

 ?>
