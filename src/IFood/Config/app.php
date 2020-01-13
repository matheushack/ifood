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
	Valitron\Validator::lang(getenv('IFOOD_LANG'));
}catch (Exception $e){
}