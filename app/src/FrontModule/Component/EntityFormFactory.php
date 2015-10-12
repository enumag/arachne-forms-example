<?php

namespace App\FrontModule\Component;

interface EntityFormFactory
{

	/**
	 * @return EntityForm
	 */
	public function create($type, array $options = [], $entity = null);

}
