<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:19
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestCategory
 * @package MatheusHack\IFood\Requests
 */
class RequestCategory
{
	use ConvertTrait;

	/**
	 * @var
	 */
	public $merchantId;

	/**
	 * @var
	 */
	public $availability;

	/**
	 * @var
	 */
	public $name;

	/**
	 * @var
	 */
	public $order;

	/**
	 * @var string
	 */
	public $template = 'PADRAO';

	/**
	 * @var
	 */
	public $externalCode;

	/**
	 * @var
	 */
	public $description;

	/**
	 * @return mixed
	 */
	public function getMerchantId()
	{
		return $this->merchantId;
	}

	/**
	 * @param mixed $merchantId
	 * @return RequestCategory
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAvailability()
	{
		return $this->availability;
	}

	/**
	 * @param mixed $availability
	 * @return RequestCategory
	 */
	public function setAvailability($availability)
	{
		$this->availability = $availability;
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
	 * @return RequestCategory
	 */
	public function setName($name)
	{
		$this->name = $name;
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
	 * @return RequestCategory
	 */
	public function setOrder($order)
	{
		$this->order = $order;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getTemplate()
	{
		return $this->template;
	}

	/**
	 * @param string $template
	 * @return RequestCategory
	 */
	public function setTemplate($template)
	{
		$this->template = $template;
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
	 * @return RequestCategory
	 */
	public function setExternalCode($externalCode)
	{
		$this->externalCode = $externalCode;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param mixed $description
	 * @return RequestCategory
	 */
	public function setDescription($description)
	{
		$this->description = $description;
		return $this;
	}
}