<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 22:53
 */

namespace MatheusHack\IFood\Services;

use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Factories\FactoryOrder;
use MatheusHack\IFood\Http\IFood;

/**
 * Class ServiceOrder
 * @package MatheusHack\IFood\Services
 */
class ServiceOrder
{
	/**
	 * @var IFood
	 */
	private $iFood;

	/**
	 * ServiceOrder constructor.
	 */
	public function __construct()
	{
		$this->iFood = new IFood();
	}

	/**
	 * @return Response
	 */
	public function events()
	{
		try {
			return $this->iFood->events();
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	public function acknowledgment(array $data)
	{
		try {
			$orders = [];

			foreach ($data['orders'] as $uuid) {
				$orders[] = [
					'id' => $uuid
				];
			}

			return $this->iFood->acknowledgment($orders);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	public function detail(array $data)
	{
		try {
			return $this->iFood->detailOrder($data['reference']);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}