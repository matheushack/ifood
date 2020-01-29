<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 18:32
 */

namespace MatheusHack\IFood\Services;


use MatheusHack\IFood\Http\IFood;
use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Constants\Availability;

/**
 * Class ServiceRestaurant
 * @package MatheusHack\IFood\Services
 */
class ServiceRestaurant
{
	/**
	 * @var IFood
	 */
	private $iFood;

	/**
	 * ServiceCategory constructor.
	 */
	public function __construct()
	{
		$this->iFood = new IFood();
	}

	/**
	 * @return Response
	 */
	public function available()
	{
		try {
			return $this->iFood->changeStatusRestaurant(Availability::ACTIVE);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param $reason
	 * @return Response
	 */
	public function unavailable($reason)
	{
		try {
			if(empty($reason))
				throw new \Exception('Need to provide a reason for restaurant unavailability');

			return $this->iFood->changeStatusRestaurant(Availability::INACTIVE, $reason);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}