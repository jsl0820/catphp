<?php 
namespace Cat\Model;

class Builder 
{
	public $table;
		
	public $alias;

	public $fields;

	public $join;

	public $limit;

	public $group;

	public $having;

	public $order;

	public $distinct = false;

	public $sql;
	
	public $grammer;
	
	/**
	 * @param $table string 表名
	 * @param $prefix string 表前缀
	 * @param $this
	 */
	public function table($table, $prefix='')
	{
		$this->$tableNmae = $prefix.$table;
		$this->grammer->compileTable($this->tableNmae);
		return $this;
	}
	
	/**
	 * @param $alias string 别名
	 * @return $this
	 */
	public function alias($alias){
		$this->alias = $alias;
		return $this;
	}

	/**
	 *  @param $columns 可变参数
	 *  @return $this
	 */
	public function field($columns = "*")
	{
		$this->fields = $this->grammer->ompileFields($columns);
		return $this;
	}
	
	/**
	 * @param  $column mixed array||strng 
	 * @param  $oprate string 操作符
	 * @param  $value mixed
	 * @param  $type 类型
	 * @return $this
	 */
	public function where($column , $oprate , $value , $type = 'and' )
	{	
		//如果传入的是数组就会解析改数组
		if (is_array($column)){
			$this->resolvArrayWheres($column);
			return 
		}
		
		//如果还没有where语句那么就不加and
		if(length($this->where) == 0){
			$type = "";
		}

		$this->where[] = $this->grammer->compileWhere($column, $oprate, $value, $type);

		return $this;
	}
	
	/** 
	 * @param $where array 
	 */
	private function resolvArrayWheres($wheres)
	{	
		foreach ($wheres as $value) {
			$this->where($value[0], $value[1], $value[2]);		
		}	
	}
	
	/**
	 * @param $table string 
	 * @param $where string
	 * @param $type string 
	 */
	public function join($table, $where, $type = 'left')
	{
		$this->join[] = $this->grammer->compileJoin($table, $where, $type);
		return $this;
	} 
	
	/**
	 * @param $order string
	 * @return $this
	 */
	public function order($order)
	{
		$this->order = $order;
		return $this;
	}

	/**
	 * @param $value int
	 * @return $this
	 */
	public function offset($value)
	{
		$this->offset = " offset {$value}";
		return $this;
	}
	
	/**
	 * @param $value int 
	 * @return $this
	 */
	public function limit($value)
	{
		$this->limit =" limit {$value}";
		return $this;
	}	
	
	/**
	 * @param $fields
	 * @return $this
	 */
	public function group ($fields)
	{
		$this->group = $fields;
		return $this;
	}

	/**
	 * @param $having 	
	 */	
	public function having($having){
		$this->having = $having;
		return $this;				
	}	
}
