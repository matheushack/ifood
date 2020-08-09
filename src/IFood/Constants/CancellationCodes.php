<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 15/01/20
 * Time: 16:44
 */

namespace MatheusHack\IFood\Constants;


use MatheusHack\IFood\Traits\ConstantsTrait;

/**
 * Class CancellationCodes
 * @package MatheusHack\IFood\Constants
 */
class CancellationCodes
{
	use ConstantsTrait;

  /**
   *
   */
  const SYSTEM_PROBLEMS = 501;

	/**
	 *
	 */
	const ORDER_DUPLICATE = 502;

	/**
	 *
	 */
	const ITEM_UNAVAILABLE = 503;

	/**
	 *
	 */
	const RESTAURANT_WITHOUT_MOTOBOY = 504;

	/**
	 *
	 */
	const MENU_OUTDATED = 505;

	/**
	 *
	 */
	const OUT_DELIVERY_AREA = 506;

	/**
	 *
	 */
	const PRANK_CALL = 507;

	/**
	 *
	 */
	const OUT_DELIVERY_TIME = 508;

	/**
	 *
	 */
	const RESTAURANT_DIFFICULTIES = 509;

	/**
	 *
	 */
	const RISK_AREA = 511;

	/**
	 *
	 */
	const RESTAURANT_WILL_OPEN_LATER = 512;

	/**
	 *
	 */
	const RESTAURANT_CLOSED_EARLIER = 513;

	/**
	 *
	 */
	const OTHER = 801;

	/**
	 *
	 */
	const MENU_UNAVAILABLE = 803;

  /**
   *
   */
  const CUSTOMER_REGISTER_INCOMPLETE = 804;

	/**
	 *
	 */
	const CUSTOMER_REQUESTED_CANCELLATION_ORDER = 817;

  /**
   *
   */
  const DELIVERY_FEE_INCONSISTENT = 818;

	/**
	 * @param $code
	 * @return mixed|string
	 */
	public static function description($code)
	{
		$descriptions = [
			self::SYSTEM_PROBLEMS => "Problemas de sistema",
			self::ORDER_DUPLICATE => "Pedido em duplicidade",
			self::ITEM_UNAVAILABLE => "Item indisponível",
			self::RESTAURANT_WITHOUT_MOTOBOY => "Restaurante sem motoboy",
			self::MENU_OUTDATED => "Cardápio desatualizado",
			self::OUT_DELIVERY_AREA => "Pedido fora da área de entrega",
			self::PRANK_CALL => "Trote",
			self::OUT_DELIVERY_TIME => "Fora do horário do delivery",
			self::RESTAURANT_DIFFICULTIES => "Dificuldades do restaurante",
			self::RISK_AREA => "Área de risco",
			self::RESTAURANT_WILL_OPEN_LATER => "Restaurante abrirá mais tarde",
			self::RESTAURANT_CLOSED_EARLIER => "Restaurante fechou mais cedo",
			self::OTHER => "Outro (descrição obrigatória)",
			self::MENU_UNAVAILABLE => "Menu não disponível",
			self::CUSTOMER_REGISTER_INCOMPLETE => "Cadastro do cliente incompleto - Cliente não atende",
			self::CUSTOMER_REQUESTED_CANCELLATION_ORDER => "Cliente final solicitou o cancelamento do pedido",
			self::DELIVERY_FEE_INCONSISTENT => "Taxa de entrega inconsistente",
		];

		return array_key_exists($code, $descriptions) ? $descriptions[$code] : "";
	}

	public static function getAllDescription()
	{
		return [
      self::SYSTEM_PROBLEMS => "Problemas de sistema",
      self::ORDER_DUPLICATE => "Pedido em duplicidade",
			self::ITEM_UNAVAILABLE => "Item indisponível",
			self::RESTAURANT_WITHOUT_MOTOBOY => "Restaurante sem motoboy",
			self::MENU_OUTDATED => "Cardápio desatualizado",
			self::OUT_DELIVERY_AREA => "Pedido fora da área de entrega",
			self::PRANK_CALL => "Trote",
			self::OUT_DELIVERY_TIME => "Fora do horário do delivery",
			self::RESTAURANT_DIFFICULTIES => "Dificuldades do restaurante",
			self::RISK_AREA => "Área de risco",
			self::RESTAURANT_WILL_OPEN_LATER => "Restaurante abrirá mais tarde",
			self::RESTAURANT_CLOSED_EARLIER => "Restaurante fechou mais cedo",
			self::OTHER => "Outro (descrição obrigatória)",
			self::MENU_UNAVAILABLE => "Menu não disponível",
      self::CUSTOMER_REGISTER_INCOMPLETE => "Cadastro do cliente incompleto - Cliente não atende",
      self::CUSTOMER_REQUESTED_CANCELLATION_ORDER => "Cliente final solicitou o cancelamento do pedido",
      self::DELIVERY_FEE_INCONSISTENT => "Taxa de entrega inconsistente",
		];
	}
}