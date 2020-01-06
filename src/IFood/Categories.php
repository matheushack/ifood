<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:50
 */

namespace MatheusHack\IFood;


use Valitron\Validator;
use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Services\ServiceCategory;
use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Exceptions\ValidateException;

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
	 * @return Entities\Response
	 */
	public function all()
	{
		return $this->service->all();
	}

	/**
	 * @param string $categoryId
	 * @return Entities\Response
	 */
	public function items($categoryId = '')
	{
		$validator = new Validator(['categoryId' => $categoryId]);
		$validator->rule('required', ['categoryId']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->items($categoryId);
	}

	/**
	 * @param array $data
	 * @return Entities\Response
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
	 * @return Entities\Response
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
	 * @return Entities\Response
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