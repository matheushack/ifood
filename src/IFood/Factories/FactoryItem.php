<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:42
 */

namespace MatheusHack\IFood\Factories;

use MatheusHack\IFood\Requests\RequestItem;
use MatheusHack\IFood\Requests\RequestPrice;
use MatheusHack\IFood\Requests\RequestSchedule;
use MatheusHack\IFood\Requests\RequestJoinGroup;
use MatheusHack\IFood\Requests\RequestJoinCategory;

/**
 * Class FactoryItem
 * @package MatheusHack\IFood\Factories
 */
class FactoryItem
{
	/**
	 * @param array $data
	 * @return array
	 */
	public function make(array $data)
	{
		$response = (new RequestItem)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setAvailability((string) $data['status'])
			->setExternalCode((string) $data['externalCode'])
			->setName((string) $data['name'])
			->setOrder((int) $data['order'])
			->setDescription((string) $data['description']);

		if(!empty($data['price']))
			$response->setPrice($this->makePrice($data['price']));

		if(!empty($data['schedules']))
			$response->setSchedules($this->makeSchedules($data['schedules']));

		return [
			'name'     => 'sku',
			'contents' => (string) json_encode($response->toArray()),
			'headers'  => [ 'Content-Type' => 'application/json']
		];
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeJoinCategory(array $data)
	{
		return (new RequestJoinCategory)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCode'])
			->setOrder((int) $data['order'])
			->toArray();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeJoinGroup(array $data)
	{
		return (new RequestJoinGroup)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'))
			->setExternalCode((string) $data['externalCodeItem'])
			->setSequence((int) $data['sequence'])
			->toArray();
	}

	/**
	 * @param $data
	 * @return array
	 */
	private function makePrice($data)
	{
		$price = (new RequestPrice)
			->setValue((double) number_format($data['amount'], 2, '.', ''))
			->setPromotional((boolean) $data['isPromotional']);

		if($data['isPromotional']){
			$price->setPromotional(true)
				->setOriginalValue((double) number_format($data['originalAmount'], 2, '.', ''));
		}

		return $price->toArray();
	}

	/**
	 * @param $data
	 * @return array
	 */
	private function makeSchedules($data)
	{
		$data = is_array($data) ? $data : [$data];
		$schedules = [];

		foreach($data as $schedule){
			$schedules[] = (new RequestSchedule)
				->setDayOfWeek($schedule)
				->toArray();
		}

		return $schedules;
	}
}