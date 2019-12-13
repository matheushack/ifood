<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 23:01
 */

namespace MatheusHack\IFood;

use MatheusHack\IFood\Entities\Categories;
use MatheusHack\IFood\Entities\Complements;
use MatheusHack\IFood\Entities\Items;

class Menu
{
	public function categories()
	{
		return new Categories();
	}

	public function items()
	{
		return new Items();
	}

	public function complements()
	{
		return new Complements();
	}

//	public function item()
//	{
//		return '/skus (POST)';
//	}
//
//	public function complement()
//	{
//		return '/option-groups (POST)';
//	}
//
//	public function addItemInCategory()
//	{
//		return '/categories/{external_code}/skus:link (POST)';
//	}
//
//	public function addComplementInItem()
//	{
//		return '/skus/{external_code}/option-groups:link (POST)';
//	}
//
//	public function addItemInComplement()
//	{
//		return '/option-groups/{external_code}/skus:link (POST)';
//	}
}