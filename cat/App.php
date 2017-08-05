<?php 
namespace Cat;
use Cat\Route\Route;

class App {

	public $instance;

	private static $catAppInstance;

	private function __construct()
	{

	}

	private function getRouteInstance($key)
	{	
		$instance = $this->instance;
		if(array_key_exists($key, $instance)){
			$this->instance[$key] = new Route($key);
			return $this->instance[$key];
		}else{
			return $instance[$key];
		}
	}

	public static function start()
	{	
		if( empty($catAppInstance) ){
			self::$catAppInstance = new App();
		}
		return self::$catAppInstance;
	}

	public function run()
	{
		$routes = require CAT_ROOT.'/route/Route.php';
		$pathInfo = $_SERVER['PATH_INFO'];
		$route = $this->getRouteInstance($pathInfo);
		echo $pathInfo;
		$route->getRequestFilePath();
	} 

}

 ?>