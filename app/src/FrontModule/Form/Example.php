<?php

namespace App\FrontModule\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Example extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('name');
    }

    public function getName()
    {
        return 'app_example';
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => 'App\FrontModule\Entity\Example',
		]);
	}

}
