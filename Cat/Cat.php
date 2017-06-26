<?php
namespace Cat;
use Library\FormWorker\Route\Route;

class Cat {

	public function __construct()
	{	
		// $route = new Route();
		$path = './App/Controller/IndexController.php';
		echo $path;
		require $path;
		exit();
		$controller = new IndexController();
		$method = "test";
		call_user_func([$controller,$method]);
	}

	public function getRequest()
	{
		$route = new Route();
		var_dump($route->get());
	}

	public function distributeRequert()
	{
		$respone = new Controller();
		$respone->test();
	}

	public function run(){

	}
}

 ?>
