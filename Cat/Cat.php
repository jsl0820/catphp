<?php
namespace Cat;
use Library\FormWorker\Route\Route;

class Cat {

	public function __construct()
	{	
		require ('../'.__DIR__.'/App/Controller/IndexController.php');
		$controller = new IndexController();
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
