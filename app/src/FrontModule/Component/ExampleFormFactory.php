<?php

namespace App\FrontModule\Component;

interface ExampleFormFactory
{

	/**
	 * @return ExampleForm
	 */	 	
	public function create($data = null);

}
