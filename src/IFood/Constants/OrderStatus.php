<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 23:14
 */

namespace MatheusHack\IFood\Constants;


use MatheusHack\IFood\Traits\ConstantsTrait;

/**
 * Class OrderStatus
 * @package MatheusHack\IFood\Constants
 */
class OrderStatus
{
	use ConstantsTrait;

	/**
	 *
	 */
	const PLACED = "PLACED";

	/**
	 *
	 */
	const INTEGRATED = "INTEGRATED";

	/**
	 *
	 */
	const CONFIRMED = "CONFIRMED";

	/**
	 *
	 */
	const CANCELLED = "CANCELLED";

	/**
	 *
	 */
	const DISPATCHED = "DISPATCHED";

	/**
	 *
	 */
	const DELIVERED = "DELIVERED";

	/**
	 *
	 */
	const CONCLUDED = "CONCLUDED";

	/**
	 *
	 */
	const REJECTED = "REJECTED";

	/**
	 * @param $status
	 * @return mixed|string
	 */
	public static function description($status)
	{
		$descriptions = [
			self::PLACED => "Pedido colocado no sistema do IFood",
			self::INTEGRATED => "Pedido recebido no sistema PDV",
			self::CONFIRMED => "Pedido confirmado",
			self::CANCELLED => "Pedido cancelado",
			self::REJECTED => "Pedido rejeitado",
			self::DISPATCHED => "Pedido enviado para entrega",
			self::DELIVERED => "Pedido entregue",
			self::CONCLUDED => "Pedido concluído",
		];

		return in_array($status, $descriptions) ? $descriptions[$status] : "";
	}
}