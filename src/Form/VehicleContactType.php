<?php

namespace App\Form;

use App\Entity\VehicleContact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class VehicleContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le nom est invalide'
                    ])
                    ],
                    'label' => 'Nom'
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le prénom est invalide'
                    ])
                    ],
                    'label' => 'Prénom'
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
                        'message' => 'Le format de l\'email est invalide',
                    ])
                    ]
            ])
            ->add('phoneNumber', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '#^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$#',
                        'message' => 'Le format du numéro n\'est pas valide. (ex: 0123456789)'
                    ])
                ],
                'label' => 'Numéro de téléphone'
            ])
            ->add('message');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VehicleContact::class,
        ]);
    }
}
