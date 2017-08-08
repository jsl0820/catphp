<?php 
namespace Cat\Controller;

class BaseController 
{	
	public $tempPath;

	public $tempelRoot = CAT_ROOT .'/app/View/';

	private $cacheRoot = CAT_ROOT .'cache';

	private $defaultConfig = [
		'cache_dir' => false,
		'debug' => false,
		'auto_reload' => true,
	];



	public function display($temp)
	{
		$temp = str_replace('.', '/', $temp). '.twig';
		$this->tempPath = $this->tempelRoot .$temp;

		$this->render($this->tempPath);
	}

	public function render()
	{	
		$tempDir = CAT_ROOT .'/app/View/Home/';
		$loader = new \Twig_Loader_Filesystem($tempDir);
		$twig = new \Twig_Environment($loader,[
			'cache' => $this->cacheRoot
			]);
		$arr = [
			'name' => 'jin',
			'age'  => '12',
			'sex'  => 'male'
		];

		
		//echo $twig->render("index2.html",['info'=>$arr]);
	}

	public function assign($var, $value = null)
	{
		if(is_array($var)){
			foreach ($var as $key => $value) {
				$this->data[$key] = $value;
			}
		}else{
			$this->data[$var] = $value;
		}
	}
}
 ?>