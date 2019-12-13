<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 13/12/19
 * Time: 16:21
 */

namespace MatheusHack\IFood\Factories;


use MatheusHack\IFood\Constants\Availability;
use MatheusHack\IFood\Requests\RequestCategory;

/**
 * Class FactoryCategory
 * @package MatheusHack\IFood\Factories
 */
class FactoryCategory implements FactoryInterface
{
	/**
	 * @param array $data
	 * @param bool $delete
	 * @return RequestCategory
	 */
	public function make(array $data, $delete = false)
	{
		return (new RequestCategory)
			->setMerchantId(getenv('MERCHANT_ID'))
			->setAvailability($this->makeAvailability($data, $delete))
			->setName(!empty($data['categoria']) ? $data['categoria'] : 'Categoria Indefinida')
			->setOrder(!empty($data['ordem']) ? (int) $data['ordem'] : 0)
			->setExternalCode(!empty($data['pdv_pedido']) ? $data['pdv_pedido'] : '')
			->setDescription(!empty($data['descricao']) ? $data['descricao'] : '');
	}

	/**
	 * @param array $data
	 * @param $delete
	 * @return mixed|string
	 */
	private function makeAvailability(array $data, $delete)
	{
		if($delete)
			return Availability::DELETE;

		if(empty($data['status']))
			return Availability::INACTIVE;

		if(!in_array($data['status'], [Availability::ACTIVE, Availability::INACTIVE]))
			return Availability::INACTIVE;

		return $data['status'];
	}
}