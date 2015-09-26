<?php

namespace App\FrontModule\Presenter;

use App\FrontModule\Component\ExampleFormFactory;

class HomepagePresenter extends BasePresenter
{

	public function createComponentForm(ExampleFormFactory $factory)
	{
		$data = null; // Or an instance of App\FrontModule\Entity\Example
		return $factory->create($data);
	}

}
