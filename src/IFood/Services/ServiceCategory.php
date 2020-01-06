<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 23:02
 */

namespace MatheusHack\IFood\Services;

use MatheusHack\IFood\Http\IFood;
use MatheusHack\IFood\Entities\Response;
use MatheusHack\IFood\Factories\FactoryCategory;

/**
 * Class ServiceCategory
 * @package MatheusHack\IFood\Services
 */
class ServiceCategory
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
	public function all()
	{
		try {
			return $this->iFood->allCategory();
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}

	/**
	 * @param $categoryId
	 * @return Response
	 */
	public function items($categoryId)
	{
		try {
			return $this->iFood->itemsByCategory($categoryId);
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
	public function store(array $data)
	{
		try {
			$request = (new FactoryCategory)->make($data);
			return $this->iFood->createCategory($request);
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
			$request = (new FactoryCategory)->makeUpdate($data);
			return $this->iFood->updateCategory($request);
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
	public function delete(array $data)
	{
		try {
			$request = (new FactoryCategory)->makeDelete($data);
			return $this->iFood->deleteCategory($request);
		} catch (\Exception $e){
			return (new Response)
				->setSuccess(false)
				->setMessage($e->getMessage());
		}
	}
}