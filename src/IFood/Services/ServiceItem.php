<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:41
 */

namespace MatheusHack\IFood\Services;


use MatheusHack\IFood\Http\IFood;
use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Factories\FactoryItem;

/**
 * Class ServiceItem
 * @package MatheusHack\IFood\Services
 */
class ServiceItem
{
	/**
	 * @var IFood
	 */
	private $iFood;

	/**
	 * ServiceItem constructor.
	 */
	public function __construct()
	{
		$this->iFood = new IFood();
	}

	/**
	 * @param $itemId
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function complements($itemId)
	{
		try {
			return $this->iFood->complementsByItem($itemId);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function store(array $data)
	{
		try {
			$request = (new FactoryItem)->make($data);
			return $this->iFood->createItem($request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function update(array $data)
	{
		try {
			$request = (new FactoryItem)->makeUpdate($data);
			return $this->iFood->updateItem($data['externalCode'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function updatePrice(array $data)
	{
		try {
			$request = (new FactoryItem)->makePrices($data);
			return $this->iFood->updatePriceItem($data['externalCode'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function updateStatus(array $data)
	{
		try {
			$request = (new FactoryItem)->makeUpdateStatus($data);
			return $this->iFood->updateStatusItem($data['externalCode'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function joinCategory(array $data)
	{
		try {
			$request = (new FactoryItem)->makeJoinCategory($data);
			return $this->iFood->joinCategory($data['externalCodeCategory'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function joinGroup(array $data)
	{
		try {
			$request = (new FactoryItem)->makeJoinGroup($data);
			return $this->iFood->joinGroup($data['externalCodeGroup'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}