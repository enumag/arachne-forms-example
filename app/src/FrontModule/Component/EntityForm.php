<?php

namespace App\FrontModule\Component;

use Arachne\Forms\Application\FormComponent;
use Arachne\Forms\Application\FormComponentFactory;
use Nette\ComponentModel\Container;
use Symfony\Component\Form\FormFactoryInterface;

class EntityForm extends Container
{

	/** @var array */
	public $onSave = [];

	/** @var FormComponentFactory */
	private $formComponentFactory;

	/** @var FormFactoryInterface */
	private $formFactory;

	/** @var string */
	private $type;

	/** @var array */
	private $options;

	/** @var mixed */
	private $entity;

	/** @var array */
	private $theme;

	public function __construct(FormComponentFactory $formComponentFactory, FormFactoryInterface $formFactory, $type, array $options = [], $entity = null)
	{
		$this->formComponentFactory = $formComponentFactory;
		$this->formFactory = $formFactory;
		$this->type = $type;
		$this->options = $options;
		$this->entity = $entity;
	}

	public function setTheme($theme)
	{
		$this->theme = (array) $theme;
	}

	/**
	 * @return FormComponent
	 */
	protected function createComponentForm()
	{
		$builder = $this->formFactory->createNamedBuilder($this->lookupPath('Nette\Application\UI\Presenter'), $this->type, $this->entity, $this->options);

		$component = $this->formComponentFactory->create($builder->getForm());

		if ($this->theme) {
			$component->onCreateView[] = function ($view, $component) {
				$component->getRenderer()->setTheme($view, $this->theme);
			};
		}
		$component->onSuccess[] = function ($entity) {
			$this->processForm($entity);
		};

		return $component;
	}

	private function processForm($entity)
	{
		// Process data, for example inject Doctrine\ORM\EntityManager and use this:
		// $this->em->persist($entity);
		// $this->em->flush();

		$this->onSave($entity);
	}

}
