<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 18:21
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Services\ServiceRestaurant;
use Valitron\Validator;

/**
 * Class Restaurant
 * @package MatheusHack\IFood
 */
class Restaurant
{
	/**
	 * @var ServiceRestaurant
	 */
	private $service;

	/**
	 * Restaurant constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceRestaurant();
	}

	/**
	 * @return Entities\Response
	 */
	public function available()
	{
		return $this->service->available();
	}

	/**
	 * @param null $reason
	 * @return Entities\Response
	 */
	public function unavailable($reason = null)
	{
		$validator = new Validator(['reason' => $reason]);
		$validator->rule('required', ['reason']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->unavailable($reason);
	}
}