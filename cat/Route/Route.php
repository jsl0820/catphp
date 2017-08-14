<?php 
namespace Cat\Route;

class Route {

	public $pathInfo;

	public $requestClass;

	public $requestMethod;

	public $routeReflection;

	public function __construct($pathInfo, $routrRule)
	{	

		$this->pathInfo = $pathInfo;
		$this->routeReflection = $routrRule[$pathInfo];
		$this->setRequestFile();
	}

	public function setRequestFile()
	{
		$reflection = $this->routeReflection;
		$refInfo = explode('@', $reflection);
		$class = str_replace('/','\\',$refInfo[0]);
		$this->requestClass = 'App\Controller\\' . $class; 
		$this->requestMethod = $refInfo[1];
	}	
}
 ?>
