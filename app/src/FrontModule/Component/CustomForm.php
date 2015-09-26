<?php

namespace App\FrontModule\Component;

use Arachne\Forms\Application\FormComponent;
use Arachne\Forms\Application\FormComponentFactory;
use Nette\Application\UI\PresenterComponent;
use Symfony\Component\Form\FormFactoryInterface;

class CustomForm extends PresenterComponent
{

	/** @var FormComponentFactory */
	private $formComponentFactory;

	/** @var FormFactoryInterface */
	private $formFactory;

	public function __construct(FormComponentFactory $formComponentFactory, FormFactoryInterface $formFactory)
	{
		$this->formComponentFactory = $formComponentFactory;
		$this->formFactory = $formFactory;
	}

	/**
	 * @return FormComponent
	 */
	protected function createComponentForm()
	{
		$builder = $this->formFactory->createNamedBuilder($this->lookupPath('Nette\Application\UI\Presenter'), 'form', null, []);

		$builder->add('firstname');
		$builder->add('lastname');
		$builder->add('email');
		$builder->add('text');

		$component = $this->formComponentFactory->create($builder->getForm());
		$component->onSuccess[] = function (array $data) {
			// process data
			$this->getPresenter()->flashMessage('The form has been sucessfully sent.');
			$this->getPresenter()->redirect('this');
		};

		return $component;
	}

}
