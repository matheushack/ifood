<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/02/20
 * Time: 23:13
 */

namespace MatheusHack\IFood\Entities;


/**
 * Class Cookie
 * @package MatheusHack\IFood\Entities
 */
class Cookie implements CacheInterface
{

	/**
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return bool
	 */
	public function add($key, $value = '', $time = 60)
	{
		// TODO: Implement set() method.
		return setcookie($key, $value, time() + $time * 60);
	}

	/**
	 * @param $key
	 * @return bool|mixed
	 */
	public function get($key)
	{
		// TODO: Implement get() method.
		return !empty($_COOKIE[$key]) ? $_COOKIE[$key] : false;
	}

	/**
	 * @return bool
	 */
	public function flush($key = '')
	{
		// TODO: Implement clear() method.
		$past = time() - 3600;

		if(!empty($key))
			return setcookie($key, $_COOKIE[$key], $past);

		foreach ($_COOKIE as $key => $value )
			setcookie($key, $value, $past);

		return true;
	}
}