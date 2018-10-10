<?php 
namespace Cat\Model\Grammer\Query;

use  Cat\Model\Builder;
class Mysql extends Grammer
{
	
	public $seleceOption = [
		'select',
		'field',
		'from',
		'table',
		'join',
		'where',
		'group',
		'having',
		'order',		
		'limit',
		'offset',
		'lock',
	];

	public $oprate = ['=', '<>','>', '<''>=','<=', 'in', 'between'];
		
	/**
	 * 组合sql语句
	 * @param $builder \Cat\Model\Builder	
	 * @return $sql string
	 */	
	public function compileSelect(Builder $builder)
	{
		foreach ($seleceOption as $component) {
			$this->
		}
	}
	
	
}
