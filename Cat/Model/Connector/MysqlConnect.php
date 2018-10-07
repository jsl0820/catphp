<?php
namespace Cat\Model\Connector;

use PDO;
/**
 *
 */
class MysqlConnector extends Connector {

	public $dnh;

	/**
	 * @param $config array
	 */
	public function __construct($config,$option=[]){
		list($username, $password) = $config;
		$dsn = $this->configParse($config)
		$this->$dnh = new PDO($dsn, $username, $password, $option) 
	}

	/**
	 * @param $config array
	 * @return $dsn string
	 */
	public function configParse($config){
		list($host, $port, $dbname) = $config
		$dsn = "mysql:host={$host}:{$port};dbname={$dbname}";
		return $dsn;
	}
	
}
