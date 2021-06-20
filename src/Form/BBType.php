<?php

namespace App\Form;

use App\Entity\HolidayHome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BBType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('address')
            ->add('floorSpace')
            ->add('roomNumber')
            ->add('Bedding')
            ->add('animals')
            ->add('highSeasonPrice')
            ->add('lowSeasonPrice')
        
            ->add('city')
            ->add('postCode')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HolidayHome::class,
        ]);
    }
}
