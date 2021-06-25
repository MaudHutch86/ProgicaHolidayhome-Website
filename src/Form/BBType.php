<?php

namespace App\Form;

use App\Entity\Amenities;
use App\Entity\HolidayHome;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BBType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',TextType::class,[
                'required' => false
            ])
            ->add('description',TextareaType::class,[
                'required' => false
            ])
            ->add('address',TextType::class,[
                'required' => false
            ])
            ->add('floorSpace',NumberType::class,[
                'required' => false
            ])
            ->add('roomNumber',NumberType::class,[
                'required' => false
            ])
            ->add('Bedding',NumberType::class,[
                'required' => false
            ])
            ->add('animals',CheckboxType::class,[
                'required' => false
            ])
            ->add('highSeasonPrice',NumberType::class,[
                'required' => false
            ])
            ->add('lowSeasonPrice', NumberType::class,[
                'required' => false
            ])
            ->add('city', TextType::class,[
                'required' => false
            ])
            ->add('postCode',NumberType::class,[
                'required' => false
            ])
           ->add('Amenities',EntityType::class,[
                'class' => Amenities :: class,
                'choice_label'=> 'name',
                'multiple'=>true
            ]);
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => HolidayHome::class,
        ]);
    }
}
