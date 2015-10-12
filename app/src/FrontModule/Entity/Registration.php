<?php

namespace App\FrontModule\Entity;

use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\Country;
use Symfony\Component\Validator\Constraints\Currency;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\Language;
use Symfony\Component\Validator\Constraints\Locale;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Time;
use Symfony\Component\Validator\Constraints\Type;
use Symfony\Component\Validator\Constraints\Url;

class Registration
{

	/**
	 * @NotBlank()
	 * @var string
	 */
	public $name;

	/**
	 * @All({
	 *   @Email()
	 * })
	 * @var string[]
	 */
	public $emails;

	/**
	 * @NotBlank()
	 * @var string
	 */
	public $gender;

	/**
	 * @var bool
	 */
	public $adult;

	/**
	 * @Country()
	 * @var string
	 */
	public $country;

	/**
	 * @All({
	 *   @Language()
	 * })
	 * @var string
	 */
	public $language;

	/**
	 * @All({
	 *   @Locale()
	 * })
	 * @var array
	 */
	public $locale;

	/**
	 * @var array
	 */
	public $timezone;

	/**
	 * @Currency()
	 * @var string
	 */
	public $currency;

	/**
	 * @NotBlank()
	 * @Date()
	 * @var string
	 */
	public $birthdate;

	/**
	 * @Time()
	 * @var string
	 */
	public $time;

	/**
	 * @NotBlank()
	 * @Date()
	 * @var string
	 */
	public $currentDate;

	/**
	 * @NotBlank()
	 * @Time()
	 * @var string
	 */
	public $currentTime;

	/**
	 * @NotBlank()
	 * @Type( type = "integer" )
	 * @GreaterThanOrEqual( 0 )
	 * @var int
	 */
	public $count;

	/**
	 * @Type( type = "float" )
	 * @var float
	 */
	public $money;

	/**
	 * @Url()
	 * @var string
	 */
	public $website;

	/**
	 * @var string
	 */
	public $notes;

}
