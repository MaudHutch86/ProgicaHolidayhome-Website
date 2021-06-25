<?php

namespace App\Form;

use App\Entity\BBSearch;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BBSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('maxPrice', IntegerType :: class, [
                'required' => false,
                'label'=> false,
                'attr'=> [
                    'placeholder' => 'Maximum Budget'
                ]
            ])
            ->add('minSurface',IntegerType :: class, [
                'required' => false,
                'label'=> false,
                'attr'=> [
                    'placeholder' => 'Minimal Price'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BBSearch::class,
            'method' => 'get' ,
            'csrf_protection' => false,
        ]);
    }
}
