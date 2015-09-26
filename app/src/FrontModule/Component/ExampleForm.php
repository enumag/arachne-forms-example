<?php

namespace App\FrontModule\Component;

use Arachne\Forms\Application\FormComponent;
use Arachne\Forms\Application\FormComponentFactory;
use Nette\ComponentModel\Container;
use Symfony\Component\Form\FormFactoryInterface;

class ExampleForm extends Container
{

	/** @var FormComponentFactory */
	private $formComponentFactory;

	/** @var FormFactoryInterface */
	private $formFactory;

	/** @var mixed */
	private $data;

	public function __construct(FormComponentFactory $formComponentFactory, FormFactoryInterface $formFactory, $data = null)
	{
		$this->formComponentFactory = $formComponentFactory;
		$this->formFactory = $formFactory;
		$this->data = $data;
	}

	/**
	 * @return FormComponent
	 */
	protected function createComponentForm()
	{
		$builder = $this->formFactory->createNamedBuilder($this->lookupPath('Nette\Application\UI\Presenter'), 'app_example', $this->data, [
			// options for App\FrontModule\Form\Example
		]);

		$component = $this->formComponentFactory->create($builder->getForm());
		
		$component->onCreateView[] = function ($view, $component) {
			$component->getRenderer()->setTheme($view, [
				// 'custom_theme.twig'
			]);
		};
		$component->onSuccess[] = function ($data) {
			$this->processForm($data);
		};
		
		return $component;
	}
	
	private function processForm()
	{
		
	}

}
