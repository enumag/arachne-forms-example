<?php

namespace App\FrontModule\Entity;

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
	 * @NotBlank()
	 * @Email()
	 * @var string
	 */
	public $email;

	/**
	 * @Country()
	 * @var string
	 */
	public $country;

	/**
	 * @Language()
	 * @var string
	 */
	public $language;

	/**
	 * @Locale()
	 * @var string
	 */
	public $locale;

	/**
	 * @var string
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
