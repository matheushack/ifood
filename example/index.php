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
use MatheusHack\IFood\Constants\Availability;

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
		*/

		dd($categories->delete([
			'externalCode' => 123456,
			'name' => 'Matheus Teste'
		]));
		dd($categories->all());
		break;
}