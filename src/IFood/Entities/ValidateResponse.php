<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 20:39
 */

namespace MatheusHack\IFood\Entities;


use Valitron\Validator;

/**
 * Class ValidateResponse
 * @package MatheusHack\IFood\Entities
 */
class ValidateResponse
{
	public function error(Validator $validator)
	{
		array_map(function($items) use (&$errors){
			$errors .= implode(PHP_EOL, $items).PHP_EOL;
		}, $validator->errors());

		return (new Response)
			->setSuccess(false)
			->setMessage($errors);
	}
}