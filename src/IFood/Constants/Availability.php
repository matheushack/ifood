<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:27
 */

namespace MatheusHack\IFood\Constants;


use MatheusHack\IFood\Traits\ConstantsTrait;

/**
 * Class Availability
 * @package MatheusHack\IFood\Constants
 */
class Availability
{
	use ConstantsTrait;

	/**
	 *
	 */
	const ACTIVE = 'AVAILABLE';

	/**
	 *
	 */
	const INACTIVE = 'UNAVAILABLE';

	/**
	 *
	 */
	const DELETE = 'DELETED';
}