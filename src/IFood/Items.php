<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:56
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Services\ServiceItem;
use Valitron\Validator;

/**
 * Class Items
 * @package MatheusHack\IFood
 */
class Items
{
	/**
	 * @var ServiceItem
	 */
	private $service;

	/**
	 * Items constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceItem();
	}

	/**
	 * @param string $itemId
	 * @return Entities\Response
	 */
	public function complements($itemId = '')
	{
		$validator = new Validator(['itemId' => $itemId]);
		$validator->rule('required', ['itemId']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->complements($itemId);
	}


	/**
	 * @param array $data
	 * @return Entities\Response
	 */
	public function create($data = [])
	{
		$validator = new Validator($data);
		$validator->rule('required', ['externalCode','name', 'order', 'status', 'description']);
		$validator->rule('integer', ['order']);
		$validator->rule('in', 'status', [Availability::ACTIVE, Availability::INACTIVE]);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->store($data);
	}
}