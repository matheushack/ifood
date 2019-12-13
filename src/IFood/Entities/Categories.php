<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:50
 */

namespace MatheusHack\IFood\Entities;


use MatheusHack\IFood\Services\ServiceCategory;

/**
 * Class Categories
 * @package MatheusHack\IFood\Entities
 */
class Categories
{
	/**
	 * @var ServiceCategory
	 */
	private $service;

	/**
	 * Categories constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceCategory();
	}

	/**
	 * @return Response
	 */
	public function all()
	{
		return $this->service->all();
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function create(array $data)
	{
		return $this->service->store($data);
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function update(array $data)
	{
		return $this->service->update($data);
	}

	/**
	 * @param array $data
	 * @return Response
	 */
	public function delete(array $data)
	{
		return $this->service->delete($data);
	}
}