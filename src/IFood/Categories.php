<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:50
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Exceptions\ValidateException;
use MatheusHack\IFood\Services\ServiceCategory;
use Valitron\Validator;

/**
 * Class Categories
 * @package MatheusHack\IFood
 */
class Categories
{
	/**
	 * @var ServiceCategory
	 */
	private $service;

	/**
	 * Categories constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceCategory();
	}

	/**
	 * @return Response
	 */
	public function all()
	{
		return $this->service->all();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function create($data = [])
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCode','name', 'order', 'status']);
		$validator->rule('integer', ['order']);
		$validator->rule('in', 'status', [Availability::ACTIVE, Availability::INACTIVE]);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->store($data);
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function update(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCode']);
		$validator->rule('integer', ['order']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->update($data);
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function delete(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCode','name']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->delete($data);
	}
}