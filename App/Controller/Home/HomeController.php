<?php
namespace App\Controller\Home;

use App\Controller;
use Cat\File\File;

class HomeController extends Controller {

	public function index() {
		$file = new File();
		// $name = $file->openFile(__DIR__ . "/test.html", "r");
		echo $name;
	}
	
}
