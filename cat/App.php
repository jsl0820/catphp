<?php 
namespace Cat;

use Cat\Route\Route;

class App {

	public $routeInstance;

	public $pathInfo;

	public $routesRoules;

	private static $catAppInstance;

	private function __construct($routesRoules, $pathInfo) {

		$this->routesRoules = $routesRoules;
		$this->pathInfo = $pathInfo;
	}

	private function getRouteInstance()
	{	
		$key = $this->pathInfo;
		$instance = $this->routeInstance;

		if(!$instance[$key]){
			$this->instance[$key] = new Route($key, $this->routesRoules);
			return $this->instance[$key];
		}else{
			return $instance[$key];
		}
	}

	public function dispatchRequest($route)
	{
		$class = $route->requestClass;
		$method = $route->requestMethod;
		call_user_func([new $class(),$method]);
	}

	public static function start()
	{	

		$routesRoules = require CAT_ROOT.'/route/Route.php';
		$pathInfo = $_SERVER['PATH_INFO'];

		if( empty($catAppInstance) ){
			self::$catAppInstance = new App( $routesRoules, $pathInfo );
		}
		return self::$catAppInstance;
	}

	public function run()
	{	
		$route = $this->getRouteInstance();
		$this->dispatchRequest($route);
	} 

}

 ?>