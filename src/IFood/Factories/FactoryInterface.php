<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:22
 */

namespace MatheusHack\IFood\Factories;


/**
 * Interface FactoryInterface
 * @package MatheusHack\IFood\Factories
 */
interface FactoryInterface
{
	/**
	 * @param array $data
	 * @param bool $delete
	 * @return mixed
	 */
	public function make(array $data, $delete = false);
}