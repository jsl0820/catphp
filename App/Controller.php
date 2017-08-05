<?php 
namespace App;
use Library\FormWorker\Controller\BaseController;

class Controller extends BaseController
{
	public $config;

	public function baseTest()
	{
		
	}

	public function display()
	{
		require_once ROOT_PATH.'/Library/Twig/Autoloader.php';
		Twig_Autoloader::register();
		$view = __DIR__.'/Home/test.php';
		$loader = new Twig_Loader_Filesystem($view);
		
		$twig = new Twig_Environment($loader, [
			'cache'=>ROOT_PATH.'Cache'
		]);

  		echo $twig->render('index.html', array('name' => 'Fabien'));
	}
}

 ?>