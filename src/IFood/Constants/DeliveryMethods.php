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
 * Class DeliveryMethods
 * @package MatheusHack\IFood\Constants
 */
class DeliveryMethods
{
    use ConstantsTrait;

    /**
     *
     */
    const DELIVERY = "DELIVERY";

    /**
     *
     */
    const TAKEOUT = "TAKEOUT";

    /**
     *
     */
    const INDOOR = "INDOOR";


    /**
     * @param $type
     * @param $location
     * @return mixed|string
     */
    public static function locationDescription($type, $location)
    {
        $locations = [
            self::DELIVERY => [
                'DEFAULT' => 'CASA CLIENTE'
            ],
            self::TAKEOUT => [
                'DEFAULT' => 'BALCÃO',
                'PICKUP_AREA' => 'ESTACIONAMENTO/ DRIVE-TRHU'
            ],
            self::INDOOR => [
                'DEFAULT' => 'BALCÃO',
                'TABLE' => 'MESA'
            ]
        ];

        return array_key_exists($type, $locations) ? $locations[$type][$location] : "";
    }
}