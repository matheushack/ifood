<?php
/**
 * Created by PhpStorm.
 * User: mhssilva
 * Date: 03/01/20
 * Time: 22:46
 */

namespace MatheusHack\IFood\Requests;


use MatheusHack\IFood\Traits\ConvertTrait;

/**
 * Class RequestSchedule
 * @package MatheusHack\IFood\Requests
 */
class RequestSchedule
{
	use ConvertTrait;

	/**
	 * @var
	 */
	private $dayOfWeek;

	/**
	 * @return mixed
	 */
	public function getDayOfWeek()
	{
		return $this->dayOfWeek;
	}

	/**
	 * @param mixed $dayOfWeek
	 * @return RequestSchedule
	 */
	public function setDayOfWeek($dayOfWeek)
	{
		$this->dayOfWeek = $dayOfWeek;
		return $this;
	}
}