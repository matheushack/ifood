<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:30
 */
require '../vendor/autoload.php';

use MatheusHack\IFood\Menu;

$menu = new Menu();
dd($menu->category(['teste' => 123]));