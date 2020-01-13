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
	 * @param $categoryId
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function itemsByCategory($categoryId)
	{
		return $this->execute(sprintf('%s/merchants/%s/menus/categories/%s', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $categoryId), 'GET');
	}

	/**
	 * @param $itemId
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function complementsByItem($itemId)
	{
		return $this->execute(sprintf('%s/merchants/%s/skus/%s/option_groups', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $itemId), 'GET');
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
	 * @param $item
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function createItem($item)
	{
		return $this->execute(sprintf('%s/skus', getenv('IFOOD_VERSION')), 'POST', $item, true);
	}

	/**
	 * @param $complement
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function createComplement($complement)
	{
		return $this->execute(sprintf('%s/option-groups', getenv('IFOOD_VERSION')), 'POST', $complement);
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
	 * @param $itemCode
	 * @param $item
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updatePriceItem($itemCode, $item)
	{
		return $this->execute(sprintf('%s/skus/%s/prices', getenv('IFOOD_VERSION'), $itemCode), 'PATCH', $item);
	}

	/**
	 * @param $itemCode
	 * @param $item
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updateItem($itemCode, $item)
	{
		return $this->execute(sprintf('%s/skus/%s', getenv('IFOOD_VERSION'), $itemCode), 'PATCH', $item, true);
	}

	/**
	 * @param $itemCode
	 * @param $item
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updateStatusItem($itemCode, $item)
	{
		return $this->execute(sprintf('%s/merchants/%s/skus/%s', getenv('IFOOD_VERSION'), getenv('IFOOD_MERCHANT_ID'), $itemCode), 'PATCH', $item);
	}


	/**
	 * @param $groupCode
	 * @param $complement
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function updateComplement($groupCode, $complement)
	{
		return $this->execute(sprintf('%s/option-groups/%s', getenv('IFOOD_VERSION'), $groupCode), 'PUT', $complement);
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
	 * @param $groupCode
	 * @param $link
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function joinGroup($groupCode, $link)
	{
		return $this->execute(sprintf('%s/option-groups/%s/skus:link', getenv('IFOOD_VERSION'), $groupCode), 'POST', $link);
	}

	/**
	 * @param $itemCode
	 * @param $link
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function joinItem($itemCode, $link)
	{
		return $this->execute(sprintf('%s/skus/%s/option-groups:link', getenv('IFOOD_VERSION'), $itemCode), 'POST', $link);
	}

	/**
	 * @param $categoryCode
	 * @param $link
	 * @return \MatheusHack\IFood\Entities\Response
	 */
	public function joinCategory($categoryCode, $link)
	{
		return $this->execute(sprintf('%s/categories/%s/skus:link', getenv('IFOOD_VERSION'), $categoryCode), 'POST', $link);
	}
}