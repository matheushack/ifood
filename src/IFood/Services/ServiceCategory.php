<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 23:02
 */

namespace MatheusHack\IFood\Services;

use MatheusHack\IFood\Factories\FactoryCategory;
use MatheusHack\IFood\Http\IFood;

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
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function all()
	{
		return $this->iFood->allCategory();
	}

	/**
	 * @param array $data
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function store(array $data)
	{
		$request = (new FactoryCategory)->make($data);
		return $this->iFood->createCategory($request);
	}

	/**
	 * @param array $data
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function update(array $data)
	{
		$request = (new FactoryCategory)->makeUpdate($data);
		return $this->iFood->updateCategory($request);
	}

	/**
	 * @param array $data
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function delete(array $data)
	{
		$request = (new FactoryCategory)->makeDelete($data);
		return $this->iFood->deleteCategory($request);
	}
}