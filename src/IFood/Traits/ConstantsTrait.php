<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 18:21
 */

namespace MatheusHack\IFood\Traits;

/**
 * Trait ConstantsTrait
 * @package MatheusHack\IFood\Traits
 */
trait ConstantsTrait
{
    /**
     * @return array
     * @throws \ReflectionException
     */
    public static function getAll()
    {
        $oClass = new \ReflectionClass(__CLASS__);
        return $oClass->getConstants();
    }
}