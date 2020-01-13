<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:57
 */

namespace MatheusHack\IFood;

use Valitron\Validator;
use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Services\ServiceGroupComplement;

/**
 * Class GroupComplements
 * @package MatheusHack\IFood
 */
class GroupComplements
{
	/**
	 * @var ServiceGroupComplement
	 */
	private $service;

	/**
	 * GroupComplements constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceGroupComplement();
	}

	/**
	 * @param array $data
	 * @return Entities\Response
	 */
	public function create($data = [])
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCode', 'name', 'sequence', 'maxQuantity']);
		$validator->rule('integer', ['sequence', 'maxQuantity', 'minQuantity']);

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
		$validator->rule('integer', ['sequence', 'maxQuantity', 'minQuantity']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->update($data);
	}

	/**
	 * @param array $data
	 * @return Entities\Response
	 */
	public function joinItem($data = [])
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCodeGroup', 'externalCodeItem', 'order', 'maxQuantity', 'minQuantity']);
		$validator->rule('integer', ['order', 'maxQuantity', 'minQuantity']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->joinItem($data);
	}
}