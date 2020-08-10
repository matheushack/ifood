<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/01/20
 * Time: 22:53
 */

namespace MatheusHack\IFood;


use MatheusHack\IFood\Constants\CancellationCodes;
use MatheusHack\IFood\Constants\OrderStatus;
use MatheusHack\IFood\Entities\ValidateResponse;
use MatheusHack\IFood\Services\ServiceOrder;
use Valitron\Validator;

/**
 * Class Orders
 * @package MatheusHack\IFood
 */
class Orders
{
	/**
	 * @var ServiceOrder
	 */
	private $service;

	/**
	 * Orders constructor.
	 */
	function __construct()
	{
		$this->service = new ServiceOrder();
	}

	/**
	 * @return Entities\Response
	 */
	public function events()
	{
		return $this->service->events();
	}

	/**
	 * @param array $data
	 * @return Entities\Response
	 */
	public function acknowledgment(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['orders']);
		$validator->rule('array', ['orders']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->acknowledgment($data);
	}

	/**
	 * @param array $data
	 * @return Entities\Response
	 * @throws \ReflectionException
	 */
	public function updateStatus(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['reference', 'status']);
		$validator->rule('in', 'status', array_keys(OrderStatus::getAll()));

		if($data['status'] == OrderStatus::REJECTED)
			$validator->rule('required', 'details');

		if($data['status'] == OrderStatus::CANCELLED) {
			$validator->rule('required', ['details', 'cancellationCode']);
			$validator->rule('in', 'cancellationCode', array_values(CancellationCodes::getAll()));
		}

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->updateStatus($data);
	}

	/**
	 * @param array $data
	 * @return Entities\Response
	 */
	public function detail(array $data)
	{
		$validator = new Validator($data);
		$validator->rule('required', ['reference']);

		if(!$validator->validate())
			return (new ValidateResponse)->error($validator);

		return $this->service->detail($data);
	}

    /**
     * @param array $data
     * @return Entities\Response
     */
    public function tracking(array $data)
    {
        $validator = new Validator($data);
        $validator->rule('required', ['order-uuid']);

        if(!$validator->validate())
            return (new ValidateResponse)->error($validator);

        return $this->service->tracking($data);
    }
}