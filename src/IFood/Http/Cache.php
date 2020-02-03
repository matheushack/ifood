<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:31
 */

namespace MatheusHack\IFood\Http;


use MatheusHack\IFood\Entities\Cookie;

/**
 * Class Cache
 * @package MatheusHack\IFood\Http
 */
class Cache
{
	/**
	 * @var
	 */
	private $cache;

	/**
	 * Cache constructor.
	 */
	public function __construct()
	{
		switch (getenv('IFOOD_CACHE_TYPE')){
			default:
				$this->cache = new Cookie();
				break;
			case 'memcache':
				$this->cache = new \Memcache('ifood-project');
				$this->cache->addServer(getenv('IFOOD_MEMCACHE_HOST'), getenv('IFOOD_MEMCACHE_PORT'));
				break;
		}

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
			return $this->cache->add($key, $value, $time);
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
			return $this->cache->add($key, $value, 0);
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
			return $this->cache->get($key);
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
			return $this->cache->flush();
		} catch (\Exception $e){
			return false;
		}
	}

}