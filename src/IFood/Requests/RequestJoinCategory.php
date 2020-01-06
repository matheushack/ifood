<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 17:19
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestJoinCategory
 * @package MatheusHack\IFood\Requests
 */
class RequestJoinCategory
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $externalCode;

	/**
	 * @var
	 */
	private $merchantId;

	/**
	 * @var
	 */
	private $order;

	/**
	 * @return mixed
	 */
	public function getExternalCode()
	{
		return $this->externalCode;
	}

	/**
	 * @param mixed $externalCode
	 * @return RequestJoinCategory
	 */
	public function setExternalCode($externalCode)
	{
		$this->externalCode = $externalCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMerchantId()
	{
		return $this->merchantId;
	}

	/**
	 * @param mixed $merchantId
	 * @return RequestJoinCategory
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
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
	 * @return RequestJoinCategory
	 */
	public function setOrder($order)
	{
		$this->order = $order;
		return $this;
	}
}