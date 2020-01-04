<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:21
 */

namespace MatheusHack\IFood\Factories;


use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Requests\RequestCategory;

/**
 * Class FactoryCategory
 * @package MatheusHack\IFood\Factories
 */
class FactoryCategory
{
	/**
	 * @param array $data
	 * @return array|mixed
	 */
	public function make(array $data)
	{
		$response = (new RequestCategory)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setAvailability((string) $data['status'])
			->setExternalCode((string) $data['externalCode'])
			->setName((string) $data['name'])
			->setOrder((int) $data['order']);

		return $response->toArray();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeUpdate(array $data)
	{
		$response = (new RequestCategory)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCode'])
			->setTemplate(null)
			->setAvailability(null);

		if(!empty($data['status']))
			$response->setAvailability((string) $data['status']);

		if(!empty($data['name']))
			$response->setName((string) $data['name']);

		if(!empty($data['order']))
			$response->setOrder((int) $data['order']);

		if(!empty($data['description']))
			$response->setDescription((string) $data['description']);

		return $response->toArray();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeDelete(array $data)
	{
		return (new RequestCategory)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCode'])
			->setAvailability(Availability::DELETE)
			->setName((string) $data['name'])
			->setTemplate(null)
			->toArray();
	}
}