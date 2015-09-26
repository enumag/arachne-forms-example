<?php

namespace App\FrontModule\Presenter;

use Kdyby\Autowired\AutowireComponentFactories;
use Kdyby\Autowired\AutowireProperties;
use Nette\Application\UI\Presenter;

class BasePresenter extends Presenter
{

	use AutowireComponentFactories;
	use AutowireProperties;

	public function formatTemplateFiles()
	{
		$parts = explode('\\', get_class($this));
		array_shift($parts);
		return [
			__DIR__ . '/../../../templates/' . implode('/', $parts) . '/' . $this->view . '.latte',
		];
	}

	public function formatLayoutTemplateFiles()
	{
		return [];
	}

}
