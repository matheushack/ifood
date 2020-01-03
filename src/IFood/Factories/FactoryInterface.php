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
	 * @return mixed
	 */
	public function make(array $data);

	public function makeUpdate(array $data);

	public function makeDelete(array $data);
}