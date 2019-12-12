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
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return bool
	 */
	public static function set($key, $value = '', $time = 60)
	{
		try {
			$memchace = (new \Memcache)->connect(getenv('MEMCACHE_HOST', getenv('MEMCACHE_PORT')));
			return $memchace->set($key, $value, MEMCACHE_COMPRESSED, $time);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @param string $value
	 * @return bool
	 */
	public static function rememberForever($key, $value = '')
	{
		try {
			$memchace = (new \Memcache)->connect(getenv('MEMCACHE_HOST', getenv('MEMCACHE_PORT')));
			return $memchace->set($key, $value, MEMCACHE_COMPRESSED, 0);
		} catch (\Exception $e){
			return false;
		}
	}

	/**
	 * @param $key
	 * @return bool
	 */
	public static function get($key)
	{
		try {
			$memchace = (new \Memcache)->connect(getenv('MEMCACHE_HOST', getenv('MEMCACHE_PORT')));
			return $memchace->get($key);
		} catch (\Exception $e){
			return false;
		}
	}

}