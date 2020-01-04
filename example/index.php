<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:30
 */
require '../vendor/autoload.php';

use MatheusHack\IFood\Restaurant;
use MatheusHack\IFood\Categories;
use MatheusHack\IFood\Items;
use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Constants\DaysOfWeek;

switch ($_GET['a'])
{
	default:
		dd('API IFOOD');
	case 'restaurant':
		$restaurant = new Restaurant();
		dd($restaurant->available());
		dd($restaurant->unavailable('Outro teste matheus'));
		break;
	case 'categories':
		$categories = new Categories();
		/*
		dd($categories->create([
			'externalCode' => 123456,
			'name' => 'Matheus Teste',
			'order' => 1,
			'status' => Availability::ACTIVE
		]));

		dd($categories->update([
			'externalCode' => 123456,
			'description' => 'Teste de update categoria'
		]));
		dd($categories->delete([
			'externalCode' => 123456,
			'name' => 'Matheus Teste'
		]));
		*/
		dd($categories->items('e9a49ae5-20c9-468b-a178-c6032c36c28a'));
		break;
	case 'item':
		$item = new Items();
		dd($item->complements('4f4a0621-504b-4617-8765-90a727b33628'));
		dd($item->create([
			'externalCode' => 'ITE1',
			'name' => 'Matheus (ITE1)',
			'order' => 1,
			'status' => Availability::ACTIVE,
			'description' => 'Item de teste para integração IFood',
			'price' => [
				'amount' => 0.5,
				'isPromotional' => true,
				'originalAmount' => 1
			],
			'schedules' => []
		]));
		break;
}