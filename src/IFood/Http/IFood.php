<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 21:09
 */

namespace MatheusHack\IFood\Http;

class IFood extends Authentication
{
	public function category()
	{
		return $this->execute('categories', OAUTH_HTTP_METHOD_POST, []);
	}
}