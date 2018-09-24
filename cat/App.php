<?php
namespace Cat;

use Cat\Route\Route;

class App {

	public static $config;

	public $routeInstance;

	public $pathInfo;

	public $routesRoules;

	private static $catAppInstance;

	private function __construct($routesRoules, $pathInfo) {

		$this->routesRoules = $routesRoules;
		$this->pathInfo = $pathInfo;
	}

	private function getRouteInstance() {
		$key = $this->pathInfo;
		$instance = $this->routeInstance;
		if (!$instance[$key]) {
			$instance[$key] = new Route($key, $this->routesRoules);
			return $instance[$key];
		} else {
			return $instance[$key];
		}
	}

	public static function start() {
		$routesRoules = require CAT_ROOT . '/route/Route.php';
		//todo  有的不支持PATH_INFO 修改为其他路由方式
		$pathInfo = $_SERVER['PATH_INFO'];
		if (empty($catAppInstance)) {
			self::$catAppInstance = new App($routesRoules, $pathInfo);
		}
		return self::$catAppInstance;
	}

	public function run() {
		// 获得路由实例
		$route = $this->getRouteInstance();
		// 分发路请求
		$this->dispatchRequest($route);
	}

	/**
	 * 分发路由请求
	 *
	 * @param $route object 实例化的路由类
	 * @return void
	 */
	public function dispatchRequest($route) {

		$class = $route->requestClass;
		$method = $route->requestMethod;
		// 根据路由请求实例化请求的类，并调用该类调用的方法
		call_user_func([new $class($route), $method]);
	}

	/**
	 * 系统设置
	 *
	 * @param $option|string
	 * @param $setting|mixed
	 * @return void
	 */
	public static function setConfig($setting) {
		self::$config[$option] = $setting;
	}

	/**
	 * 获取app config
	 *
	 *
	 */
	public function getAppConfig() {}

}

?>