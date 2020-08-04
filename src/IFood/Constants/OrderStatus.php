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
    const CANCELLATION_REQUESTED = "CANCELLATION_REQUESTED";

    /**
     *
     */
    const CANCELLATION_REQUEST_FAILED = "CANCELLATION_REQUEST_FAILED";

	/**
	 *
	 */
	const CANCELLED = "CANCELLED";

    /**
     *
     */
    const GOING_TO_ORIGIN = "GOING_TO_ORIGIN";

    /**
     *
     */
    const ARRIVED_AT_ORIGIN = "ARRIVED_AT_ORIGIN";

    /**
     *
     */
    const READY_TO_DELIVER = "READY_TO_DELIVER";

    /**
     *
     */
    const COLLECTED = "COLLECTED";

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
    const PICKUP_AREA_ASSIGNED = "PICKUP_AREA_ASSIGNED";

    /**
     *
     */
    const DELAY_NOTIFICATION = "DELAY_NOTIFICATION";

    /**
     *
     */
    const CHANGE_PREPARATION_TIME = "CHANGE_PREPARATION_TIME";

    /**
     *
     */
    const REQUEST_DRIVER_AVAILABILITY = "REQUEST_DRIVER_AVAILABILITY";

    /**
     *
     */
    const REQUEST_DRIVER = "REQUEST_DRIVER";

    /**
     *
     */
    const REQUEST_DRIVER_SUCCESS = "REQUEST_DRIVER_SUCCESS";

    /**
     *
     */
    const REQUEST_DRIVER_FAILED = "REQUEST_DRIVER_FAILED";

    /**
     *
     */
    const ASSIGN_DRIVER = "ASSIGN_DRIVER";

    /**
     *
     */
    const CONSUMER_CANCELLATION_REQUESTED = "CONSUMER_CANCELLATION_REQUESTED";

    /**
     *
     */
    const CONSUMER_CANCELLATION_ACCEPTED = "CONSUMER_CANCELLATION_ACCEPTED";

    /**
     *
     */
    const CONSUMER_CANCELLATION_DENIED = "CONSUMER_CANCELLATION_DENIED";

    /**
     *
     */
    const ADDED_TO_GROUP = "ADDED_TO_GROUP";

    /**
     *
     */
    const EXECUTED_WITH_GROUP = "EXECUTED_WITH_GROUP";

    /**
     *
     */
    const CANCELLED_WITH_GROUP = "CANCELLED_WITH_GROUP";


    /**
     *
     */
    const COLLECTED_IN_GROUP = "COLLECTED_IN_GROUP";

    /**
     *
     */
    const ASSIGNED_WITH_GROUP = "ASSIGNED_WITH_GROUP";


    /**
     *
     */
    const UPDATE_REQUESTED = "UPDATE_REQUESTED";

    /**
     *
     */
    const UPDATE_DENIED = "UPDATE_DENIED";

    /**
     *
     */
    const UPDATED = "UPDATED";

    /**
     *
     */
    const BOX_ASSIGNED = "BOX_ASSIGNED";

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
			self::CANCELLATION_REQUESTED => "Solicitação de cancelamento do pedido",
			self::CANCELLATION_REQUEST_FAILED => "Solicitação de cancelamento negada",
			self::CANCELLED => "Pedido cancelado",
			self::GOING_TO_ORIGIN => "Entregador se deslocando para retirar pedido",
			self::ARRIVED_AT_ORIGIN => "Entregador chegou para retirar o pedido",
			self::READY_TO_DELIVER => "Pedido pronto para ser retirado",
			self::COLLECTED => "Pedido Coletado",
			self::DISPATCHED => "Pedido enviado para entrega",
            self::DELIVERED => "Pedido entregue",
            self::CONCLUDED => "Pedido concluído",
            self::PICKUP_AREA_ASSIGNED => "Cliente chegou na vaga para retirar pedido",
            self::DELAY_NOTIFICATION => "Notificação de atraso",
            self::CHANGE_PREPARATION_TIME => "Alteração do Tempo de Preparo do Pedido",
            self::REQUEST_DRIVER_AVAILABILITY => "Verificar disponibilidade de entregador iFood",
            self::REQUEST_DRIVER => "Requisitar entregador iFood",
            self::REQUEST_DRIVER_SUCCESS => "Requisição de entregador iFood aprovada",
            self::REQUEST_DRIVER_FAILED => "Requisição de entregador iFood negada",
            self::ASSIGN_DRIVER => "Entregador alocado",
            self::CONSUMER_CANCELLATION_REQUESTED => "Solicitação de cancelamento do pedido pelo cliente",
            self::CONSUMER_CANCELLATION_ACCEPTED => "Solicitação de cancelamento do pedido pelo cliente aceita",
            self::CONSUMER_CANCELLATION_DENIED => "Solicitação de cancelamento do pedido pelo cliente negada",
            self::ADDED_TO_GROUP => "Agrupamento de Pedidos - Uso exclusivo iFood",
            self::EXECUTED_WITH_GROUP => "Agrupamento de Pedidos - Uso exclusivo iFood",
            self::CANCELLED_WITH_GROUP => "Agrupamento de Pedidos - Uso exclusivo iFood",
            self::COLLECTED_IN_GROUP => "Agrupamento de Pedidos - Uso exclusivo iFood",
            self::ASSIGNED_WITH_GROUP => "Agrupamento de Pedidos - Uso exclusivo iFood",
            self::UPDATE_REQUESTED => "Requisição de alteração de informação do pedido",
            self::UPDATE_DENIED => "Requisição de alteração de informação do pedido negada",
            self::UPDATED => "Pedido alterado",
            self::BOX_ASSIGNED => "Pedido pode ser colocado no Box",
            self::REJECTED => "Pedido rejeitado",
        ];

		return array_key_exists($status, $descriptions) ? $descriptions[$status] : "";
	}
}