<?php 
namespace Cat\Route;
class Route {

	public $route;

	private $rule;

	public function __construct($route,$rule)
	{	
		$this->route = $route;
		$this->rule = $rule;
		$this->routeReflection = $rule[$route];
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

	public function getRequestFilePath()
	{
		$routeReflection = $this->routeReflection;

		echo $routeReflection;
	}

	public function getRequestMethod()
	{	

	}
	
}


 ?>
}
