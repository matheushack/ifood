<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 13:44
 */

namespace MatheusHack\IFood\Services;

use MatheusHack\IFood\Http\IFood;
use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Factories\FactoryGroupComplement;

/**
 * Class ServiceGroupComplement
 * @package MatheusHack\IFood\Services
 */
class ServiceGroupComplement
{
	/**
	 * @var IFood
	 */
	private $iFood;

	/**
	 * ServiceGroupComplement constructor.
	 */
	function __construct()
	{
		$this->iFood = new IFood();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function store(array $data)
	{
		try {
			$request = (new FactoryGroupComplement)->make($data);
			return $this->iFood->createComplement($request);
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
			$request = (new FactoryGroupComplement)->makeUpdate($data);
			return $this->iFood->updateComplement($data['externalCode'], $request);
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
	public function joinItem(array $data)
	{
		try {
			$request = (new FactoryGroupComplement)->makeJoinItem($data);
			return $this->iFood->joinItem($data['externalCodeItem'], $request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}