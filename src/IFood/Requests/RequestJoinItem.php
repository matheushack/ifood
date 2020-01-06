<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 17:07
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestJoinItem
 * @package MatheusHack\IFood\Requests
 */
class RequestJoinItem
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $merchantId;

	/**
	 * @var
	 */
	private $maxQuantity;

	/**
	 * @var
	 */
	private $minQuantity;

	/**
	 * @var
	 */
	private $externalCode;

	/**
	 * @var
	 */
	private $order;

	/**
	 * @return mixed
	 */
	public function getMerchantId()
	{
		return $this->merchantId;
	}

	/**
	 * @param mixed $merchantId
	 * @return RequestJoinItem
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMaxQuantity()
	{
		return $this->maxQuantity;
	}

	/**
	 * @param mixed $maxQuantity
	 * @return RequestJoinItem
	 */
	public function setMaxQuantity($maxQuantity)
	{
		$this->maxQuantity = $maxQuantity;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMinQuantity()
	{
		return $this->minQuantity;
	}

	/**
	 * @param mixed $minQuantity
	 * @return RequestJoinItem
	 */
	public function setMinQuantity($minQuantity)
	{
		$this->minQuantity = $minQuantity;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getExternalCode()
	{
		return $this->externalCode;
	}

	/**
	 * @param mixed $externalCode
	 * @return RequestJoinItem
	 */
	public function setExternalCode($externalCode)
	{
		$this->externalCode = $externalCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getOrder()
	{
		return $this->order;
	}

	/**
	 * @param mixed $order
	 * @return RequestJoinItem
	 */
	public function setOrder($order)
	{
		$this->order = $order;
		return $this;
	}
}