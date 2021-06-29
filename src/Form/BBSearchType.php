<?php

namespace App\Form;

use App\Entity\BBSearch;

use App\Entity\Amenities;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BBSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('minSurface', IntegerType::class,[
                'required'=>false,
                'label'=>'surface minimum'
            ])
            ->add('maxBedding',IntegerType::class,[
                'required'=>false,
                'label'=>'BeddingMax'
            ])
            ->add('animalsAccepted',CheckboxType::class,[
                 'label'=> 'animals acceptance'
            ])
            ->add('perCity',TextareaType::class,[
                'label' => 'City'
            ])
            ->add('perAmenities',EntityType::class,[
               'class'=> Amenities:: class,
        'label'=> 'Amenities',
               'choice_label'=> 'name',
               'multiple'=> true
            ])
            ->add('submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BBSearch::class,
            'method' =>'get',
            'csrf_protection'=> false
        ]);
    }
}
