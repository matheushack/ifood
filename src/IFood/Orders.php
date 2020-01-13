<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 22:53
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Services\ServiceOrder;
use Valitron\Validator;

/**
 * Class Orders
 * @package MatheusHack\IFood
 */
class Orders
{
	/**
	 * @var ServiceOrder
	 */
	private $service;

	/**
	 * Orders constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceOrder();
	}

	/**
	 * @return Entities\Response
	 */
	public function events()
	{
		return $this->service->events();
	}

	public function acknowledgment(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['orders']);
		$validator->rule('array', ['orders']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->acknowledgment($data);
	}

	public function detail(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['reference']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->detail($data);
	}
}