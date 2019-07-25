<?php

namespace App\Form;

use App\Entity\Bike;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BikeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('brand',null,[
                'label'=>'bike.form.brand.label'
            ])
            ->add('model',null,[
                'label'=>'bike.form.model.label'
            ])
            ->add('matriculation',null,[
                'label'=>'bike.form.matriculation.label'
            ])
            ->add('color',null,[
                'label'=>'bike.form.color.label'
            ])
            ->add('power',null, [
                'label'=>'bike.form.power.label'
            ])
            ->add('km')
            ->add('productionYear', DateType::class, [
                'label' => 'bike.form.productionYear.label',
                'widget' => 'choice',
                'format' => 'M-d-y',
                'years' => range('1910', date('Y'),1),
            ])
            ->add('status',ChoiceType::class, [
                'label'=>'bike.form.status.label',
                'choices'=>[
                    'bike.form.status.available.label'=>1,
                    'bike.form.status.unavailable.label'=>2,
                    'bike.form.status.repair.label'=>3
                ]
            ])
            ->add('tags')
            ->add('bikeOwner',null, [
                'label'=>'bike.form.bikeOwner.label'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bike::class,
            'translation_domain' => 'messages',
        ]);
    }
}
