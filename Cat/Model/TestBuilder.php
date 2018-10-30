<?php 
namespace Cat\Model;

use Cat\Model\Builder;
use Cat\Model\Grammar\Query\Mysql;
use PHPUnit\Framework\TestCase;

class TestBuilder extends TestCase
{
	public function testBuilder()
	{
		$build = new Builder();
		print_r($build);
	}
}

