<?php 
namespace Cat\Model\Grammar\Query;

use  Cat\Model\Builder;
class Mysql extends Grammar
{
	
	public $seleceOption = [
		'select',
		'field',
		'from',
		'table',
		'alias',
		'join',
		'where',
		'group',
		'having',
		'order',		
		'limit',
		'offset',
		'lock',
	];

	public $oprate = [
		'=', '<>','>', '<''>=','<=', 'in', 'between'
	];
	
	/**
	 * 解析 field 
	 * @param $columns string||array
	 * @return string  
	 * 
	*/	
	public function compileFields($columns)
	{
		if (is_array($columns)){
			return implode(",", $columns);
		}
		return $columns;
	}
	
	/**
	 * @param $table string   
	 * @param $where string
	 * @param $type string 
	 * @return string
	 */
	public function compileJoin($table, $where, $type)
	{
		return "{$type}join {$table} on {$where}";	
	} 

	/**
	 * @param  $column mixed array||strng 
	 * @param  $oprate string 操作符
	 * @param  $value mixed
	 * @param  $type 类型
	 * @return string
	 */
	public function compileWhere($column, $oprate, $value, $type)
	{
		if(in_array($oprate)){
			echo "不支持该操作符";
			return;
		}	
		
		//mysql in 操作符
		if(is_array($value) && $oprate == 'in'){
			return " {$type} {$columns} in (".implode(",", $value).")";
		}
		
		//between 操作符
		if(is_array($value) && $oprate == 'between'){
			return " {$type} {$column} between {$value[0]} and {$value[1]}"
		}

		return " {$type} {$column} {$oprate} {$value}";

	}

	/**
	 * 组合sql语句
	 * @param $builder \Cat\Model\Builder	
	 * @return $sql string
	 */	
	public function compileSelect(Builder $builder)
	{
		$sql = "";
		foreach ($seleceOption as $component) {
			$val = $builder->$component;
			$compile =  is_array($val):implode(" ", $val) ? $val
			return $sql." {$compile} "
		}
		return $sql;
	}

	
}
