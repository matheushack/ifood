<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 22:30
 */
require '../vendor/autoload.php';

use MatheusHack\IFood\Orders;

$orders = new Orders();
$events = $orders->events();
dd($events);