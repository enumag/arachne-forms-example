<?php

namespace App\FrontModule\Component;

interface CustomFormFactory
{

	/**
	 * @return CustomForm
	 */
	public function create($data = null);

}
