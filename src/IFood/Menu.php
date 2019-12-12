<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 23:01
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Services\ServiceCategory;

class Menu
{
	public function category(array $data)
	{
		$service = new ServiceCategory();
		return $service->create($data);
	}

	public function item()
	{
		return '/skus (POST)';
	}

	public function complement()
	{
		return '/option-groups (POST)';
	}

	public function addItemInCategory()
	{
		return '/categories/{external_code}/skus:link (POST)';
	}

	public function addComplementInItem()
	{
		return '/skus/{external_code}/option-groups:link (POST)';
	}

	public function addItemInComplement()
	{
		return '/option-groups/{external_code}/skus:link (POST)';
	}
}