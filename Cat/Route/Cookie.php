<?php 
namespace Cat\Cookie

/**
 * 
 */
class Cookie 
{
	
	//Cookie有效域名/子域名
	public $path = '/';

	//Cookie的过期时间(秒数)
	public $expire;

	// public $path;

	// public $domain;

	// public $secure = false;

	// public $isHttpOnly = false;


	function __construct(argument)
	{
		# code...
	}

	/**
	 * 设置cookie
	 * @param $key string
	 * @param $value mixed 
	 * @param $expire int 
	 * @return bool   
	 */
	public function set($key, $value, $expire, $path, $domain, $secure, $httponly)
	{	
		$stamp = time();
		if (!is_null($expire))
		{	
			return setcookie($key, $value, $stamp + $expire, $path, $domain, $secure, $httponly)
		} else {
			return setcookie($key, $value, $stamp + $this->expire, $path, $domain, $secure, $httponly)
		}	

	}


	/**
	 * 
	 */
	public function delete($key)
	{	
		if ($this->has($key)){
			setCookie($key);
			return ture;
		} else {
			echo "未设置";
		}
	}

	/**
	 * 获取 cookie值
	 * @param $key string
	 * @return mixed
	 */
	public function get($key)
	{	
		return $this->has($key) ? $_COOKIE[$key]:false;
	}


	/**
	 * @param $key string 
	 * @return bool 
	 */			
	public function delete($key)
	{	
		if (!$this->has($key)){
			setCookie($key);
			return false;
		} else {
			return true;
		}
	}

	/**
	 * 判断cookie中是否有$key对应的值	
	 * @param $key string
	 * @param bool 
	 */
	public function has($key)
	{
		$value = $_COOKIE[$key];
		// $res = is_null($value)?false:true;
		return s_null($value) ? false:true;
	}

	/**
	 * 获取所有cookie值
	 * @param key string 
	 * @return array 
	 */
	public function all($key)
	{
		return $_COOKIE;
	}

	/**
	 * 仅用一次的cookie
	 * @param $key
	 * @param $value
	 * @return bool
	 */	
	public function flush($key, $value)
	{

	}

	public function __get($value)
	{
		$this->get($key);
	}

	public function __set($value)
	{
		$this->set($value)
	}
}
