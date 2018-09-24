<?php
namespace Cat\Model\Connector;

use PDO;
use \Cat\Model\MysqlConnector;

class ConnectorFactory {
	/**
	 *  数据库表前缀
	 */
	public $prefix;
	/**
	 * 所有数据库链接
	 */
	protected $connectorAlis;

	/**
	 * 默认数据库类型
	 */
	protected $defaultDatabase;

	/**
	 * 链接数据库
	 *  @param $config array 系统数据库配置
	 */
	public function connect($dsn){

		if ($config!=null){
			$instance = $this->instanceDatabase($dsn);
			$this->connectorAlis[$dsn] = $instance;
			return $instance;
		}

		if($this->connectorAlis($dsn)){
			return $this->connectorAlis($dsn);
		}
	}

	/**
	 *  解析配置参数	
	 *  @param  $config array
	 *  @return string 
	 */
	public function parseConfig($config){
		extract($config);
		$this->defaultDatabase = $  
		return $dsn;
	}

	/**
	 * @return string 数据库类型
	 */
	public function getDatabaseType($type) {

	}

	/**
	 * @param $dsn
	 * @return PDO 实例
	 */
	public function instanceDatabase($dsn) {

	}

	


}
