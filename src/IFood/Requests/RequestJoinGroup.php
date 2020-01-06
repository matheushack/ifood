<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 06/01/20
 * Time: 17:06
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestJoinGroup
 * @package MatheusHack\IFood\Requests
 */
class RequestJoinGroup
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
	private $sequence;

	/**
	 * @return mixed
	 */
	public function getExternalCode()
	{
		return $this->externalCode;
	}

	/**
	 * @param mixed $externalCode
	 * @return RequestJoinGroup
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
	 * @return RequestJoinGroup
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
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
	 * @return RequestJoinGroup
	 */
	public function setSequence($sequence)
	{
		$this->sequence = $sequence;
		return $this;
	}
}