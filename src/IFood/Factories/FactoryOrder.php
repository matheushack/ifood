<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 23:23
 */

namespace MatheusHack\IFood\Factories;


use MatheusHack\IFood\Constants\OrderStatus;
use MatheusHack\IFood\Requests\RequestOrder;

/**
 * Class FactoryOrder
 * @package MatheusHack\IFood\Factories
 */
class FactoryOrder
{
	/**
	 * @param $status
	 * @return string
	 * @throws \Exception
	 */
	public function makeStatus($status)
	{
		switch ($status){
			default:
				throw new \Exception('Status not found');
			case OrderStatus::INTEGRATED:
				return "integration";
			case OrderStatus::CONFIRMED:
				return "confirmation";
            case OrderStatus::READY_TO_DELIVER:
                return "readyToDeliver";
			case OrderStatus::DISPATCHED:
				return "dispatch";
			case OrderStatus::REJECTED:
				return "rejection";
			case OrderStatus::CANCELLED:
				return "cancellationRequested";
		}
	}
}