<?php

namespace App\FrontModule\Presenter;

use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{

	public function formatTemplateFiles()
	{
		$parts = explode('\\', get_class($this));
		array_shift($parts);
		return [
			__DIR__ . '/../../../templates/' . implode('/', $parts) . '/' . $this->view . '.latte',
		];
	}

}
