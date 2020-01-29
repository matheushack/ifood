<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:42
 */

namespace MatheusHack\IFood\Factories;

use JBZoo\Image\Image;
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
	 * @throws \JBZoo\Image\Exception
	 * @throws \JBZoo\Utils\Exception
	 */
	public function makeUpdate(array $data)
	{
		$response = (new RequestItem)
			->setMerchantId((string) getenv('IFOOD_MERCHANT_ID'));

		if(!empty($data['name']))
			$response->setName((string) $data['name']);

		if(!empty($data['description']))
			$response->setDescription((string) $data['description']);

		if(!empty($data['status']))
			$response->setAvailability((string) $data['status']);

		if(!empty($data['price']))
			$response->setPrice($this->makePrice($data['price']));

		$return[] = [
			'name'     => 'sku',
			'contents' => (string) json_encode($response->toArray()),
			'headers'  => [ 'Content-Type' => 'application/json']
		];

		if(!empty($data['image'])) {
			$image = new Image($data['image']['tmp_name']);
			$return[] = [
				'name' => 'file',
				'contents' => $image->getBase64('jpeg', 100, true),
				'headers'  => [ 'Content-Type' => 'multipart/form-data']
			];
		}

		return $return;
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makePrices(array $data)
	{
		$response = (new RequestItem)
			->setMerchantIds([(string) getenv('IFOOD_MERCHANT_ID')])
			->setPrice((double) number_format($data['amount'], 2, '.', ''));

		if(!empty($data['starDate']))
			$response->setStartDate((string) $data['startDate']);

		return $response->toArray();
	}

	/**
	 * @param array $data
	 * @return array
	 */
	public function makeUpdateStatus(array $data)
	{
		return (new RequestItem)
			->setStatus((string) $data['status'])
			->toArray();
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