<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 21:09
 */

namespace MatheusHack\IFood\Http;

use MatheusHack\IFood\Requests\RequestCategory;

/**
 * Class IFood
 * @package MatheusHack\IFood\Http
 */
class IFood extends Authentication
{
	/**
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function allCategory()
	{
		return $this->execute(sprintf('%s/merchants/%s/menus/categories', getenv('VERSION'), getenv('MERCHANT_ID')), 'GET');
	}

	/**
	 * @param RequestCategory $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function createCategory(RequestCategory $category)
	{
		return $this->execute(sprintf('%s/categories', getenv('VERSION')), 'POST', $category);
	}

	/**
	 * @param RequestCategory $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updateCategory(RequestCategory $category)
	{
		return $this->execute(sprintf('%s/categories', getenv('VERSION')), 'PUT', $category);
	}

	/**
	 * @param RequestCategory $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function deleteCategory(RequestCategory $category)
	{
		return $this->execute(sprintf('%s/categories', getenv('VERSION')), 'POST', $category);
	}
}