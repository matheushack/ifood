<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 13:45
 */

namespace MatheusHack\IFood\Factories;


use MatheusHack\IFood\Requests\RequestJoinItem;
use MatheusHack\IFood\Requests\RequestComplement;

/**
 * Class FactoryGroupComplement
 * @package MatheusHack\IFood\Factories
 */
class FactoryGroupComplement
{
	/**
	 * @param array $data
	 * @return array
	 */
	public function make(array $data)
	{
		$response = (new RequestComplement)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCode'])
			->setName((string) $data['name'])
			->setMaxQuantity((int) $data['maxQuantity'])
			->setSequence((int) $data['sequence']);

		if(!empty($data['minQuantity']))
			$response->setMinQuantity((int) $data['minQuantity']);

		return $response->toArray();
	}

	public function makeUpdate(array $data)
	{
		$response = (new RequestComplement)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'));

		if(!empty($data['name']))
			$response->setName((string) $data['name']);

		if(!empty($data['minQuantity']))
			$response->setMinQuantity((int) $data['minQuantity']);

		if(!empty($data['maxQuantity']))
			$response->setMaxQuantity((int) $data['maxQuantity']);

		if(!empty($data['sequence']))
			$response->setSequence((int) $data['sequence']);

		return $response->toArray();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeJoinItem(array $data)
	{
		return (new RequestJoinItem)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCodeGroup'])
			->setMinQuantity((int) $data['minQuantity'])
			->setMaxQuantity((int) $data['maxQuantity'])
			->setOrder((int) $data['order'])
			->toArray();
	}
}