<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 23:23
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestOrder
 * @package MatheusHack\IFood\Requests
 */
class RequestOrder
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $id;

	/**
	 * @var
	 */
	private $reference;

	/**
	 * @var
	 */
	private $shortReference;

	/**
	 * @var
	 */
	private $type;

	/**
	 * @var
	 */
	private $merchant;

	/**
	 * @var
	 */
	private $payments;

	/**
	 * @var
	 */
	private $customer;

	/**
	 * @var
	 */
	private $items;

	/**
	 * @var
	 */
	private $subTotal;

	/**
	 * @var
	 */
	private $totalPrice;

	/**
	 * @var
	 */
	private $deliveryFee;

	/**
	 * @var
	 */
	private $deliveryAddress;

	/**
	 * @var
	 */
	private $deliveryDateTime;

	/**
	 * @var
	 */
	private $preparationTimeInSeconds;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 * @return RequestOrder
	 */
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getReference()
	{
		return $this->reference;
	}

	/**
	 * @param mixed $reference
	 * @return RequestOrder
	 */
	public function setReference($reference)
	{
		$this->reference = $reference;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getShortReference()
	{
		return $this->shortReference;
	}

	/**
	 * @param mixed $shortReference
	 * @return RequestOrder
	 */
	public function setShortReference($shortReference)
	{
		$this->shortReference = $shortReference;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getType()
	{
		return $this->type;
	}

	/**
	 * @param mixed $type
	 * @return RequestOrder
	 */
	public function setType($type)
	{
		$this->type = $type;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getMerchant()
	{
		return $this->merchant;
	}

	/**
	 * @param mixed $merchant
	 * @return RequestOrder
	 */
	public function setMerchant($merchant)
	{
		$this->merchant = $merchant;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPayments()
	{
		return $this->payments;
	}

	/**
	 * @param mixed $payments
	 * @return RequestOrder
	 */
	public function setPayments($payments)
	{
		$this->payments = $payments;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCustomer()
	{
		return $this->customer;
	}

	/**
	 * @param mixed $customer
	 * @return RequestOrder
	 */
	public function setCustomer($customer)
	{
		$this->customer = $customer;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getItems()
	{
		return $this->items;
	}

	/**
	 * @param mixed $items
	 * @return RequestOrder
	 */
	public function setItems($items)
	{
		$this->items = $items;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getSubTotal()
	{
		return $this->subTotal;
	}

	/**
	 * @param mixed $subTotal
	 * @return RequestOrder
	 */
	public function setSubTotal($subTotal)
	{
		$this->subTotal = $subTotal;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTotalPrice()
	{
		return $this->totalPrice;
	}

	/**
	 * @param mixed $totalPrice
	 * @return RequestOrder
	 */
	public function setTotalPrice($totalPrice)
	{
		$this->totalPrice = $totalPrice;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDeliveryFee()
	{
		return $this->deliveryFee;
	}

	/**
	 * @param mixed $deliveryFee
	 * @return RequestOrder
	 */
	public function setDeliveryFee($deliveryFee)
	{
		$this->deliveryFee = $deliveryFee;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDeliveryAddress()
	{
		return $this->deliveryAddress;
	}

	/**
	 * @param mixed $deliveryAddress
	 * @return RequestOrder
	 */
	public function setDeliveryAddress($deliveryAddress)
	{
		$this->deliveryAddress = $deliveryAddress;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDeliveryDateTime()
	{
		return $this->deliveryDateTime;
	}

	/**
	 * @param mixed $deliveryDateTime
	 * @return RequestOrder
	 */
	public function setDeliveryDateTime($deliveryDateTime)
	{
		$this->deliveryDateTime = $deliveryDateTime;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPreparationTimeInSeconds()
	{
		return $this->preparationTimeInSeconds;
	}

	/**
	 * @param mixed $preparationTimeInSeconds
	 * @return RequestOrder
	 */
	public function setPreparationTimeInSeconds($preparationTimeInSeconds)
	{
		$this->preparationTimeInSeconds = $preparationTimeInSeconds;
		return $this;
	}
}