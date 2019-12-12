<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 23:02
 */

namespace MatheusHack\IFood\Services;


use MatheusHack\IFood\Http\IFood;

class ServiceCategory
{
	private $iFood;

	public function __construct()
	{
		$this->iFood = new IFood();
	}

	public function create(array $data)
	{
		return $this->iFood->category($data);
	}
}