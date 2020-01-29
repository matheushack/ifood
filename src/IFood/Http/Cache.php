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
	/**
	 * @var
	 */
	private $memcached;

	/**
	 * Cache constructor.
	 */
	public function __construct()
	{
		$this->memcached = new \Memcache('ifood-project');
		$this->memcached->addServer(getenv('MEMCACHE_HOST'), getenv('MEMCACHE_PORT'));
	}

	/**
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return bool
	 */
	public function set($key, $value = '', $time = 60)
	{
		try {
			return $this->memcached->add($key, $value, $time);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @param string $value
	 * @return bool
	 */
	public function rememberForever($key, $value = '')
	{
		try {
			return $this->memcached->add($key, $value, 0);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @return bool|mixed
	 */
	public function get($key)
	{
		try {
			return $this->memcached->get($key);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @return bool
	 */
	public function clear()
	{
		try {
			return $this->memcached->flush();
		} catch (\Exception $e){
			return false;
		}
	}

}