<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 22:53
 */

namespace MatheusHack\IFood\Services;

use MatheusHack\IFood\Constants\OrderStatus;
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

	/**
	 * @param array $data
	 * @return Response
	 */
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

	/**
	 * @param array $data
	 * @return Response
	 */
	public function updateStatus(array $data)
	{
		try {
			$reference = $data['reference'];
      $isReadyToDelivery = $data['status'] == OrderStatus::READY_TO_DELIVER;
			$isCancelOrder = $data['status'] == OrderStatus::CANCELLED;
			$status = (new FactoryOrder)->makeStatus($data['status']);
			unset($data['status']);
			unset($data['reference']);

			return $this->iFood->updateStatusOrder($reference, $status, $isCancelOrder, $isReadyToDelivery, $data);
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

    /**
     * @param array $data
     * @return Response
     */
    public function tracking(array $data)
    {
        try {
            $orderId = $data['order-uuid'];

            return $this->iFood->tracking($orderId);
        } catch (\Exception $e){
            return (new Response)
                ->setSuccess(false)
                ->setMessage($e->getMessage());
        }
    }
}