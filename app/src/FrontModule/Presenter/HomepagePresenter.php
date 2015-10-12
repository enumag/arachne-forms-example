<?php

namespace App\FrontModule\Presenter;

use App\FrontModule\Component\EntityFormFactory;
use App\FrontModule\Entity\Registration;

class HomepagePresenter extends BasePresenter
{

	public function createComponentForm(EntityFormFactory $factory)
	{
		$registration = new Registration();
		$registration->name = 'enumag';
		$registration->emails = [
			'tousek@m33.cz',
			'enumag@gmail.com',
		];
		return $factory->create('App\FrontModule\Form\Registration', [], $registration);
	}

}
