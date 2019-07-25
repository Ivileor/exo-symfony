<?php

namespace App\Form;

use App\Entity\BikeOwner;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BikeOwnerType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gender', ChoiceType::class, [
                'choices'=>[
                    'person.gender.male.label'=>1,
                    'person.gender.female.label'=>2,
                    'person.gender.other.label'=>3,
                ]
            ])
            ->add('firstName')
            ->add('lastName')
            ->add('address')
            ->add('postalCode')
            ->add('city')
            ->add('mail')
            ->add('phone')
            ->add('birthDate',DateType::class,[
                'years'=>range('1910', date('Y'),1),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BikeOwner::class,
        ]);
    }
}
