<?php

namespace App\Form;

use App\Entity\Orders;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use function Symfony\Component\Clock\now;

class OrdersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('number', ChoiceType::class, [
                'label' => 'Nombre de personnes',
                'choices' => [
                    '2 couverts' => 2,
                    '3 couverts' => 3,
                    '4 couverts' => 4,
                    '5 couverts' => 5,
                    '6 couverts' => 6,
                ]
            ])
            ->add('time', TimeType::class, [
                'label' => 'Heure de réservation',

            ])
            ->add('dates', DateType::class, [
                'label' => 'Jour de la réservation',
                'widget' => 'single_text',
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('phone', TelType::class, [
                'label' => 'Téléphone'
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email'
            ])
            ->add('notes', TextareaType::class, [
                'label' => 'Commentaires, allergies et habitudes alimentaires (facultatif)',
                'required' => false
            ])
            ->add('isAgree', CheckboxType::class, [
                'label' => 'J\'ai pris connaissance que toute réservation entre 19h et 19h30 doit être libérée à 21h30',
                'required' => true
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Orders::class,
        ]);
    }
}
