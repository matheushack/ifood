<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:30
 */
require '../vendor/autoload.php';

use MatheusHack\IFood\Items;
use MatheusHack\IFood\Orders;
use MatheusHack\IFood\Categories;
use MatheusHack\IFood\Restaurant;
use MatheusHack\IFood\GroupComplements;
use MatheusHack\IFood\Constants\DaysOfWeek;
use MatheusHack\IFood\Constants\OrderStatus;
use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Constants\CancellationCodes;

//$categories = new Categories();
//$items = new Items();
//$groupComplement = new GroupComplements();

$categoriaCode = "C100";
$itemCode = "I100";
$subItemCode = "SI100";
$subItemCode2 = "SI101";
$groupCode = "G100";

//dd('CATEGORIA', $categories->create([
//	'externalCode' => $categoriaCode,
//	'name' => 'Lanches',
//	'order' => 1,
//	'status' => Availability::ACTIVE
//]));

//dd('GRUPO COMPLEMENTO', $groupComplement->create([
//	'externalCode' => $groupCode,
//	'name' => 'Bebida',
//	'sequence' => 1,
//	'minQuantity' => 1,
//	'maxQuantity' => 1
//]));

//dd('ITEM PRINCIPAL', $items->create([
//	'externalCode' => $itemCode,
//	'name' => 'Hack X-burguer',
//	'order' => 1,
//	'status' => Availability::ACTIVE,
//	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
//	'price' => [
//		'amount' => 1,
//		'isPromotional' => false
//	],
//	'schedules' => [DaysOfWeek::MON, DaysOfWeek::TUE, DaysOfWeek::WED, DaysOfWeek::THU, DaysOfWeek::FRI]
//]));

//dd('SUBITEM 1', $items->create([
//	'externalCode' => $subItemCode,
//	'name' => 'Coca-cola',
//	'order' => 2,
//	'status' => Availability::ACTIVE,
//	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
//	'price' => [
//		'amount' => 2,
//		'isPromotional' => false
//	],
//	'schedules' => []
//]));

//dd('SUBITEM 2', $items->create([
//	'externalCode' => $subItemCode2,
//	'name' => 'Fanta Uva',
//	'order' => 1,
//	'status' => Availability::ACTIVE,
//	'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
//tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
//	'price' => [
//		'amount' => 3,
//		'isPromotional' => false
//	],
//	'schedules' => []
//]));

//dd('LINKANDO SUBITEM 1 NO GRUPO', $items->joinGroup([
//	'externalCodeGroup' => $groupCode,
//	'externalCodeItem' => $subItemCode,
//	'sequence' => 1
//]));

//dd('LINKANDO SUBITEM 2 NO GRUPO', $items->joinGroup([
//	'externalCodeGroup' => $groupCode,
//	'externalCodeItem' => $subItemCode2,
//	'sequence' => 1
//]));

//dd('LIKANDO GRUPO AO ITEM PRINCIPAL', $groupComplement->joinItem([
//	'externalCodeGroup' => $groupCode,
//	'externalCodeItem' => $itemCode,
//	'maxQuantity' => 1,
//	'minQuantity' => 1,
//	'order' => 1
//]));

//dd('LINKANDO ITEM PRINCIPAL A CATEGORIA', $items->joinCategory([
//	'externalCode' => $itemCode,
//	'externalCodeCategory' => $categoriaCode,
//	'order' => 1
//]));
//dd('CADASTROU TUDO');

switch ($_GET['a'])
{
	default:
		dd('API IFOOD');
	case 'restaurant':
		$iFood = new Restaurant();
		dd($iFood->available());
		dd($iFood->unavailable('Outro teste matheus'));
		break;
	case 'categories':
		$iFood = new Categories();
//		dd($iFood->create([
//			'externalCode' => 'CAT100',
//			'name' => 'Categoria 100',
//			'order' => 1,
//			'status' => Availability::ACTIVE
//		]));
//
//		dd($categories->update([
//			'externalCode' => 123456,
//			'description' => 'Teste de update categoria'
//		]));
//		dd($categories->delete([
//			'externalCode' => 123456,
//			'name' => 'Matheus Teste'
//		]));
//		dd($iFood->items('e9a49ae5-20c9-468b-a178-c6032c36c28a'));
		break;
	case 'item':
		$iFood = new Items();
//		dd($iFood->create([
//			'externalCode' => 'ITE101',
//			'name' => 'Item 101',
//			'order' => 1,
//			'status' => Availability::ACTIVE,
//			'description' => 'Item FILHO de teste para integração IFood',
//			'price' => [
//				'amount' => 1,
//				'isPromotional' => false
//			],
//			'schedules' => []
//		]));
//		dd($iFood->joinCategory([
//			'externalCode' => 'ITE100',
//			'externalCodeCategory' => 'CAT100',
//			'order' => 1
//		]));
//		dd($iFood->joinGroup([
//			'externalCodeGroup' => 'GRP100',
//			'externalCodeItem' => 'ITE101',
//			'sequence' => 1
//		]));
//		dd($iFood->updatePrice([
//			'externalCode' => $itemCode,
//			'amount' => 2.50
//		]));
//		dd($iFood->updateStatus([
//			'externalCode' => $itemCode,
//			'status' => Availability::ACTIVE
//		]));
		break;
	case 'upload':
		if(!empty($_FILES['file'])) {
			$iFood = new Items();
			//dd($iFood->update([
			//	'externalCode' => $itemCode,
			//	'price' => [
			//		'amount' => 4,
			//		'isPromotional' => false
			//	],
			//	'image' => $_FILES['file']
			//]));
		} else {
			echo "<form action='example?a=upload' enctype='multipart/form-data' method='post'>
					<input type='file' name='file'>
					<input type='submit' value='Enviar'>
				</form>";
			exit;
		}
		break;
	case 'complement':
		$iFood = new GroupComplements();
//		dd($iFood->create([
//			'externalCode' => 'GRP100',
//			'name' => 'Grupo complemento 100',
//			'sequence' => 1,
//			'maxQuantity' => 10
//		]));
//		dd($iFood->connectToItem([
//			'externalCode' => 'GRP100',
//			'externalCodeItem' => 'ITE101',
//			'sequence' => 1
//		]));
//		dd($iFood->update([
//			'externalCode' => $groupCode,
//			'name' => 'Bebida Editado',
//			'sequence' => 1,
//			'maxQuantity' => 10,
//			'minQuantity' => 1
//		]));
		break;
	case 'order':
		$iFood = new Orders();
//		$events = $iFood->events();
//
//		if(!empty($events->getData())) {
//			$orders = [];
//
//			foreach($events->getData() as $item) {
//				$orders[] = $item->id;
//
//				//if($item->code == \MatheusHack\IFood\Constants\OrderStatus::PLACED) {
//				//	dd($iFood->detail([
//				//		'reference' => $item->correlationId
//				//	]));
//				//}
//			}
//
//			dd($iFood->acknowledgment([
//				'orders' => $orders
//			]));
//		}
//		dd($iFood->detail([
//			'reference' => "4060193689901044"
//		]));

		dd($iFood->updateStatus([
			'status' => OrderStatus::CANCELLED,
			'reference' => '4060193689901044',
			'details' => 'Pedido cancelado teste',
			'cancellationCode' => CancellationCodes::PRANK_CALL
		]));
		break;
}