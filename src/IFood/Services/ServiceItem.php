<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:41
 */

namespace MatheusHack\IFood\Services;


use MatheusHack\IFood\Factories\FactoryItem;
use MatheusHack\IFood\Http\IFood;

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
		return $this->iFood->complementsByItem($itemId);
	}

	/**
	 * @param array $data
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function store(array $data)
	{
		$request = (new FactoryItem)->make($data);
		return $this->iFood->createItem($request);
	}
}