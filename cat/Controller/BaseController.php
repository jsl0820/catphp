<?php 
namespace Cat\Controller;


class BaseController 
{	

	public $route; 

	public $data;

	public $tempPath;

	public $tempelRoot = CAT_ROOT .'/app/View/';

	public $extension = '.html';

	private $cacheRoot = CAT_ROOT .'cache';

	private $defaultConfig = [
		'cache_dir' => false,
		'debug' => false,
		'auto_reload' => true,
	];

	public function __construct($route)
	{	
		$this->route = $route;
	}

	protected function request()
	{
		return $this->$route;
	}


	/**
	 * 定位模板文件地址 
	 *	
	 * @param string $temp 
	 * @return void
	 */
	public final function display($temp)
	{
		$tempArr = explode('.', $temp);
		$tempFile = array_pop($tempArr) .$this->extension;
		$tempDir = $this->tempelRoot .implode('/', $tempArr) .'/';
		$this->render($tempDir, $tempFile);
	}
		
	/**
	 * twig 模板引擎渲染 
	 *
	 * @param  string $tempDir
	 * @param  string $tempFile
	 * @return void
	 */
	public final function render($tempDir, $tempFile)
	{	
		$loader = new \Twig_Loader_Filesystem($tempDir);
		$twig = new \Twig_Environment($loader,[
			'cache' => $this->cacheRoot,
			'debug' => true,
			]);

		echo $twig->render($tempFile,$this->data);
	}

	/**
	 * 模板赋值 
	 * 
	 * @param $var 
	 */
	public final function assign($var, $value = null)
	{
		if (is_array($var)){
			foreach ($var as $key => $value) {
				$this->data[$key] = $value;
			}
		} else {
			$this->data[$var] = $value;
		}
	}

}
?>