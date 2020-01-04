<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:45
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestPrice
 * @package MatheusHack\IFood\Requests
 */
class RequestPrice
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $originalValue;

	/**
	 * @var
	 */
	private $promotional;

	/**
	 * @var
	 */
	private $value;

	/**
	 * @return mixed
	 */
	public function getOriginalValue()
	{
		return $this->originalValue;
	}

	/**
	 * @param mixed $originalValue
	 * @return RequestPrice
	 */
	public function setOriginalValue($originalValue)
	{
		$this->originalValue = $originalValue;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPromotional()
	{
		return $this->promotional;
	}

	/**
	 * @param mixed $promotional
	 * @return RequestPrice
	 */
	public function setPromotional($promotional)
	{
		$this->promotional = $promotional;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getValue()
	{
		return $this->value;
	}

	/**
	 * @param mixed $value
	 * @return RequestPrice
	 */
	public function setValue($value)
	{
		$this->value = $value;
		return $this;
	}
}