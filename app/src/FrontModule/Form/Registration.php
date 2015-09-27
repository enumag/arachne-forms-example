<?php

namespace App\FrontModule\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Registration extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('name');
		$builder->add('email');

		$builder->add('gender', 'choice', [
			'expanded' => true,
			'choices' => [
				'm' => 'Male',
				'f' => 'Female',
			],
		]);
		$builder->add('adult', 'checkbox');

		$builder->add('country');
		$builder->add('language', 'language', [
			'required' => true,
			'multiple' => true,
		]);
		$builder->add('locale', 'locale', [
			'multiple' => true,
		]);
		$builder->add('timezone', 'timezone');
		$builder->add('currency', 'currency');

		$builder->add('birthdate', 'birthday');
		$builder->add('time');

		$builder->add('currentDate', 'date', [
			'widget' => 'single_text',
		]);
		$builder->add('currentTime', null, [
			'widget' => 'single_text',
		]);

		$builder->add('count', 'integer');

		$builder->add('money', 'money');

		$builder->add('website');

		$builder->add('notes', 'textarea');
    }

    public function getName()
    {
        return 'app_registration';
    }

	public function configureOptions(OptionsResolver $resolver)
	{
		$resolver->setDefaults([
			'data_class' => 'App\FrontModule\Entity\Registration',
		]);
	}

}
