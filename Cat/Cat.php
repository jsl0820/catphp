<?php
namespace Cat;
use Library\FormWorker\Route\Route;

class Cat {

	private static $instance;

	public function __construct()
	{	
		
		$controller = new \App\Controller\IndexController();
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
