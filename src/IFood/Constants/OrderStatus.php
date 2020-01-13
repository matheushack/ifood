<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 23:14
 */

namespace MatheusHack\IFood\Constants;


/**
 * Class OrderStatus
 * @package MatheusHack\IFood\Constants
 */
class OrderStatus
{
	/**
	 *
	 */
	const PLACED = "PLACED";

	/**
	 *
	 */
	const INTEGRATE = "INTEGRATED";

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
	 * @param $status
	 * @return mixed|string
	 */
	public static function description($status)
	{
		$descriptions = [
			self::PLACED => "Pedido colocado no sistema do IFood",
			self::INTEGRATE => "Pedido recebido no sistema PDV",
			self::CONFIRMED => "Pedido confirmado",
			self::CANCELLED => "Pedido cancelado",
			self::DISPATCHED => "Pedido enviado para entrega",
			self::DELIVERED => "Pedido entregue",
			self::CONCLUDED => "Pedido concluído"
		];

		return in_array($status, $descriptions) ? $descriptions[$status] : "";
	}
}