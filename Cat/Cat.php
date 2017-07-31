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
		//$this->distributeRequert();
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
		$modelFile =$this->modelPath.$model.$this->controllerSuffix;
		return $modelFile;
	}

	//请求
	public function getRequest($pathInfo)
	{
		$arr = explode('/',$pathInfo);

		$request = [
			'action' => $this->getActionName($arr),
			'modul'  => $this->getModelPath($arr) 
		];

		return $request;
	}

	//响应
	public function response($request)
	{	
		$controller = new $request['modul']();
		$action = $request['action'];

		$response = call_user_func([$controller,$action]);

		dd($response);
		return $response;
	}


	//发送响应(显示)
	public function handleResponse()
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
		$route = new Route();
		$pathInfo = $route->pathInfo;
		$request = $this->getRequest($pathInfo);
		$response = $this->response($request);
		exit();
		$this->handleResponse($response);
	}	
}

 ?>
