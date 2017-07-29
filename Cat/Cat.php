<?php
namespace Cat;
use Library\FormWorker\Route\Route;

class Cat {

	private $controllerSuffix = 'Controller';

	private $modelPath ='\App\Controller';
	//请求方法名
	public $action;
	//请求文件路径
	public $model;

	private static $instance;



	public function __construct()
	{	
		

		//dd($_SERVER['PATH_INFO']);
		// $controller = new \App\Controller\IndexController();
		//$method = "test";
		//call_user_func([$controller,$method]);
		$this->getRequest();
	}

	private function getActionName($arr)
	{
		$action = array_pop($arr);
		return $action ;
	}

	private function getModelPath($arr)
	{
		array_pop($arr);
		$model = implode('\\', $arr);
		$modelFile =$this->modelPath.$model.$this->controllerSuffix.'()';
		return $modelFile;
	}

	public function getRequest()
	{
		$route = new Route();
		$pathInfo = $route->pathInfo;
		$arr = explode('/',$pathInfo);
		$this->action = $this->getActionName($arr);
		$this->model = $this->getModelPath($arr);
		$test = new $this->model;
		$test->test();
	}

	public function distributeRequert()
	{
		
	}

	public function instance($abstract)
	{	
		$instance;

		if(in_array($abstract, $this->instance)){
			 $this->instance[$abstract];
		}else{
			$instance[$abstract] = new $abstract;
		}

		return $instance;
	}

	public function run()
	{

	}
}

 ?>
