<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 13:46
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestComplement
 * @package MatheusHack\IFood\Requests
 */
class RequestComplement
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $merchantId;

	/**
	 * @var
	 */
	private $externalCode;

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
	private $name;

	/**
	 * @var
	 */
	private $sequence;

	/**
	 * @return mixed
	 */
	public function getMerchantId()
	{
		return $this->merchantId;
	}

	/**
	 * @param mixed $merchantId
	 * @return RequestComplement
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
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
	 * @return RequestComplement
	 */
	public function setExternalCode($externalCode)
	{
		$this->externalCode = $externalCode;
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
	 * @return RequestComplement
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
	 * @return RequestComplement
	 */
	public function setMinQuantity($minQuantity)
	{
		$this->minQuantity = $minQuantity;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * @param mixed $name
	 * @return RequestComplement
	 */
	public function setName($name)
	{
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSequence()
	{
		return $this->sequence;
	}

	/**
	 * @param mixed $sequence
	 * @return RequestComplement
	 */
	public function setSequence($sequence)
	{
		$this->sequence = $sequence;
		return $this;
	}
}