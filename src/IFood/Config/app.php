<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 20:33
 */

try {
	$dotenv = Dotenv\Dotenv:: create($_SERVER['DOCUMENT_ROOT']);
	$dotenv->load();
}catch (Exception $e){
}