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
 * Class BenefitsType
 * @package MatheusHack\IFood\Constants
 */
class BenefitsType
{
    use ConstantsTrait;

    /**
     *
     */
    const ITEM = "ITEM";

    /**
     *
     */
    const CART = "CART";

    /**
     *
     */
    const DELIVERY_FEE = "DELIVERY_FEE";


    /**
     * @param $type
     * @return mixed|string
     */
    public static function name($type)
    {
        $benefitsTypes = [
            self::ITEM => "Item",
            self::CART => "Carrinho",
            self::DELIVERY_FEE => "Frete"
        ];

        return array_key_exists($type, $benefitsTypes) ? $benefitsTypes[$type] : "";
    }
}