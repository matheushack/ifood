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
	/**
	 * @param $status
	 * @param null $reason
	 * @return \MatheusHack\IFood\Entities\Response
	 */
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

	/**
	 * @param $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function createCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'POST', $category);
	}

	/**
	 * @param $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updateCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'PUT', $category);
	}

	/**
	 * @param $category
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function deleteCategory($category)
	{
		return $this->execute(sprintf('%s/categories', getenv('IFOOD_VERSION')), 'PUT', $category);
	}

	/**
	 * @param $categoryId
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function itemsByCategory($categoryId)
	{
		return $this->execute(sprintf('%s/merchants/%s/menus/categories/%s', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $categoryId), 'GET');
	}

	/**
	 * @param $item
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function createItem($item)
	{
		return $this->execute(sprintf('%s/skus', getenv('IFOOD_VERSION')), 'POST', $item);
	}

	/**
	 * @param $itemId
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function complementsByItem($itemId)
	{
		return $this->execute(sprintf('%s/merchants/%s/skus/%s/option_groups', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $itemId), 'GET');
	}
}