<?php
namespace Cat\Model\Connector;

use PDO;
use \Cat\Model\MysqlConnector;

class Connector {

	public  $stmt;
	/**
	 * PDO 属性 
	 */
	public $option = [

	];		
	/**
	 * 数据库实例
	 */
	public $connector;

	
	/**
	 * 链接数据库
	 *  @param $drive 	
	 *  @param $config array 系统数据库配置
	 */
	public function connect($config){

		if ($config!=null){
			$instance = $this->instanceDatabase($dsn);
			$this->connector[$dsn] = $instance;
			return $instance;
		}

		if($this->connector($dsn)){
			return $this->connector($dsn);
		}
	}


	/**
	 * @param $dsn
	 * @return PDO 实例
	 */
	public function instanceDatabase($config) {
		$option = $this->option;
		switch ($driver){
		case 'mysql':
			return new MysqlConnector($connection,$option);
		case 'sqlsrv':
			return new SqlServerConnector($connection,$option);
		case 'pgsql':
			return new PostgresConnector($connection,$option);
		}
	}

	/**
	 * 获取默认的pdo实例
	 */
	public function getConnectorInstance($dsn){
		return $this->connector[$dsn]
	}

	/**
	 *  @param $sql string
	 *  @return $statement
	 */
	public function query($sql){
		$pdo = $this->getConnectorInstance()->pdo;
		return $pdo->query($sql)
	}

	/**
	 * @param $sql string
	 * @return $affectedrow
 	 */
	public function exec($sql){
		$pdo = $this->getConnectorInstance()->pdo;
		return $pdo->exec($sql);
	}
	/**
	 * 过滤一些特殊字符
	 * @param $string
	 * @return $string
	 */
	public function fliteSqlString($string){
		$pdo = $this->getConnectorInstance()->pdo;
		return $pdo->quote($string);
	}

	/**
	 * @param 带有参数的prepareSql 语句
	 */
	public function prepare($sql){
		$pdo = $this->getConnectorInstance()->pdo;
		$this->stmt = $pdo::prepare($sql)
	}

	/**
	 * @param array 绑定的参数值
	 */
	public function bindParam($params){
		$pdo = $this->getConnectorInstance()->pdo;
		foreach ($params as $key => $value) {
			$this->stmt->bindParam($value, $key)
		}
	}

	public function execute(){
		$this->stmt->execute();
	}
}
