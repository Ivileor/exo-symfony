<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trackDate')
            ->add('status', ChoiceType::class, [
                'choices'=>[
                    'reservation.status.ongoing.label'=>1,
                    'reservation.status.cancelled.label'=>2,
                    'reservation.status.confirmed.label'=>3,
                ]
            ])
            ->add('bike')
            ->add('customer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
