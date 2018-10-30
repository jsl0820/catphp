<?php 
namespace Cat\Model\Grammar\Query;

use Cat\Model\Builder;

class Grammar
{
	/**
	 * 编译update语法
	 * @param $data 关联数组
	 * @param $builder \Cat\Model\Builder
	 * @return string
	 */
	public function compileUpdate($data, Builder $builder)
	{	
		$where = implode(" ", $builder->where);
		$table = $builder->table;
		$resolveData = $this->resolveUpdateArray($data);
		return "update {$table} {$resolveData} {$where}";
	}
	
	/**
	 * 编译插入语句 
	 * @param $data 关联数组
	 * @param $builder \Cat\Model\Builder
	 * @return string
	 */
	public function compileInsert($data, Builder $builder)
	{
		$where = implode(" ", $builder->where);
		$table = $builder->table;
		$resolveData = $this->resolveInsertArray($data);
		return "insert into {$table} {$resolveData}";
	}
	
	/**
	 * 解析执行insert 语句的数组
	 * @param array 关联数组
	 * @return string
	 */
	public function resolveInsertArray($data)
	{
		$fields = []; 
		$values = [];
		foreach ($data as $field => $value) {
			array_push($fields, $field);
			array_push($values, `'{$value}'`);			
		}
		$fields = implode(", ", $fields);
		$values = implode(", ", $values);
		return "({$fields}) values ({$values})";
	}
	
	/**
	 * 解析执行update语句的数组
	 * @param array 关联数组
	 * @return string
	 */
	public function resolveUpdateArray($data)
	{	
		$set = [];
		foreach ($data as $field => $value) {
			array_push($set, "{$field}='".$value."'");				
		}		
		return " set ".implode(",", $set);
	}

	/**
	 * @param $builder \Cat\Model\Builder
	 * @return string
	 */
	public function compileDelete(Builder $builder)
	{
		$table = $builder->table;
		$where = implode("," ,$builder->where);
		return 	"delete from {$table} {where}"
	} 
}
