<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 18:21
 */

namespace MatheusHack\IFood\Traits;

/**
 * Trait ConvertTrait
 * @package MatheusHack\IFood\Traits
 */
trait ConvertTrait
{
    /**
     * @return array
     */
    public function toArray()
    {
        $array = (array) get_object_vars($this);
        return array_filter($array);
    }
}