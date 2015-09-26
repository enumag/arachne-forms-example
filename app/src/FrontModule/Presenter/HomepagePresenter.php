<?php

namespace App\FrontModule\Presenter;

use App\FrontModule\Component\EntityFormFactory;

class HomepagePresenter extends BasePresenter
{

	public function createComponentForm(EntityFormFactory $factory)
	{
		return $factory->create('app_registration', [], null);
	}

}
