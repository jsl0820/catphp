<?php
namespace Cat\File;
use PHPUnit\Framework\TestCase;

// ./vendor/bin/phpunit Cat/File/FileTest
class FileTest extends TestCase {

	// public function testBase() {
	// 	// $obj = new File;
	// 	fopen(__DIR__ . "/test.txt", "r");
	// }

	public function testBase() {
		$path = __DIR__ . "/test.txt";
		$dest = __DIR__ . "/test222.txt";
		$obj = new File;
		$obj->delete($path);
		// echo $obj->read($path);
	}
}
