<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 15/12/19
 * Time: 19:34
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestItem
 * @package MatheusHack\IFood\Requests
 */
class RequestItem
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $merchantId;

	/**
	 * @var
	 */
	private $merchantIds;

	/**
	 * @var
	 */
	private $availability;

	/**
	 * @var
	 */
	private $status;

	/**
	 * @var
	 */
	private $externalCode;

	/**
	 * @var
	 */
	private $name;

	/**
	 * @var
	 */
	private $description;

	/**
	 * @var
	 */
	private $order;

	/**
	 * @var
	 */
	private $price;

	/**
	 * @var
	 */
	private $schedules;

	/**
	 * @var
	 */
	private $startDate;

	/**
	 * @return mixed
	 */
	public function getMerchantId()
	{
		return $this->merchantId;
	}

	/**
	 * @param mixed $merchantId
	 * @return RequestItem
	 */
	public function setMerchantId($merchantId)
	{
		$this->merchantId = $merchantId;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMerchantIds()
	{
		return $this->merchantIds;
	}

	/**
	 * @param mixed $merchantIds
	 * @return RequestItem
	 */
	public function setMerchantIds($merchantIds)
	{
		$this->merchantIds = $merchantIds;
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
	 * @return RequestItem
	 */
	public function setAvailability($availability)
	{
		$this->availability = $availability;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param mixed $status
	 * @return RequestItem
	 */
	public function setStatus($status)
	{
		$this->status = $status;
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
	 * @return RequestItem
	 */
	public function setExternalCode($externalCode)
	{
		$this->externalCode = $externalCode;
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
	 * @return RequestItem
	 */
	public function setName($name)
	{
		$this->name = $name;
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
	 * @return RequestItem
	 */
	public function setDescription($description)
	{
		$this->description = $description;
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
	 * @return RequestItem
	 */
	public function setOrder($order)
	{
		$this->order = $order;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPrice()
	{
		return $this->price;
	}

	/**
	 * @param mixed $price
	 * @return RequestItem
	 */
	public function setPrice($price)
	{
		$this->price = $price;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSchedules()
	{
		return $this->schedules;
	}

	/**
	 * @param mixed $schedules
	 * @return RequestItem
	 */
	public function setSchedules($schedules)
	{
		$this->schedules = $schedules;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStartDate()
	{
		return $this->startDate;
	}

	/**
	 * @param mixed $startDate
	 * @return RequestItem
	 */
	public function setStartDate($startDate)
	{
		$this->startDate = $startDate;
		return $this;
	}
}