<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/02/20
 * Time: 23:13
 */

namespace MatheusHack\IFood\Entities;


/**
 * Interface CacheInterface
 * @package MatheusHack\IFood\Entities
 */
interface CacheInterface
{
	/**
	 * @param $key
	 * @param string $value
	 * @param int $time
	 * @return mixed
	 */
	public function add($key, $value = '', $time = 60);

	/**
	 * @param $key
	 * @return mixed
	 */
	public function get($key);

	/**
	 * @return mixed
	 */
	public function flush();
}