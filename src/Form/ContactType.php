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
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le nom est invalide'
                    ])
                ]
            ])
            ->add('firstname', TextType::class, [
                'constraints' => [
                    new Regex([
                        'pattern' => '/^[a-zA-ZÀ-ÿ\s\'-]+$/',
                        'message' => 'Le prénom est invalide'
                    ])
                ]
            ])
            ->add('email', EmailType::class, [
                'constraints' => [
                    new Email([
                        'message' => 'L\'adresse email "{{ value }}" n\'est pas valide',
                        'mode' => 'html5', //Utilise le mode html5 pour la validation
                    ])
                ]
            ])
            ->add('phoneNumber', TextType::class, [
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
