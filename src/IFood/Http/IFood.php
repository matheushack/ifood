<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 12/12/19
 * Time: 21:09
 */

namespace MatheusHack\IFood\Http;

/**
 * Class IFood
 * @package MatheusHack\IFood\Http
 */
class IFood extends Authentication
{
	public function changeStatusRestaurant($status, $reason = null)
	{
		$data = [
			'status' => $status
		];

		if(!empty($reason))
			$data['reason'] = $reason;

		return $this->execute(sprintf('%s/merchants/%s/statuses', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID')), 'PUT', $data);
	}

	/**
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function allCategory()
	{
		return $this->execute(sprintf('%s/merchants/%s/menus/categories', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID')), 'GET');
	}

	public function createCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'POST', $category);
	}

	public function updateCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'PUT', $category);
	}

	public function deleteCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'PUT', $category);
	}
}