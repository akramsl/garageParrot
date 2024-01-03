<?php

namespace App\Form;

use App\Entity\ContactForm;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Regex;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => "/^[a-zA-ZÀ-ÿ\s'\-]+$/u",
                        'message' => 'Le nom est invalide'
                    ])
                ],
                'label' => 'Nom'
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Prénom',
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le prénom est invalide'
                    ])
                ]
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
                'label' => 'Numéros de téléphone',
                'constraints' => [
                    new Regex([
                        'pattern' => '#^(0|\+33)[1-9]([-. ]?[0-9]{2}){4}$#',
                        'message' => 'Le format du numéro n\'est pas valide. (ex: 0123456789)'
                    ]),
                ],
                'error_bubbling' => true,
            ])
            ->add('message');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactForm::class,
        ]);
    }
}
