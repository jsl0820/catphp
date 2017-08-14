<?php 
namespace App\Controller\Home;

use Cat\Model;
use App\Model\Goods;
use App\Controller;
class HomeController extends Controller{

	public function index(){

		//$config = App::$config;
		App::$config = 2345;
		var_dump($config);
	} 

	public function woaini(){
		

		$config = App::$config;
		var_dump($config);
		//(new Goods())->select()->where()->all();
		//(new Model('goods'))->select();
	} 


}

?>