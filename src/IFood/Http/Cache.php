<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:31
 */

namespace MatheusHack\IFood\Http;


/**
 * Class Cache
 * @package MatheusHack\IFood\Http
 */
class Cache
{
	private $memcached;

	public function __construct()
	{
		$this->memchaced = new \Memcached('ifood-project');

		if (!count($this->memchaced->getServerList()))
			$this->memchaced->addServer(getenv('MEMCACHE_HOST'), getenv('MEMCACHE_PORT'));
	}

	public function set($key, $value = '', $time = 60)
	{
		try {
			return $this->memchaced->add($key, $value, $time);
		} catch (\Exception $e){
			return false;
		}
	}

	public function rememberForever($key, $value = '')
	{
		try {
			return $this->memchaced->add($key, $value, 0);
		} catch (\Exception $e){
			return false;
		}
	}

	public function get($key)
	{
		try {
			return $this->memchaced->get($key);
		} catch (\Exception $e){
			return false;
		}
	}

	public function clear()
	{
		try {
			return $this->memchaced->flush();
		} catch (\Exception $e){
			return false;
		}
	}

}