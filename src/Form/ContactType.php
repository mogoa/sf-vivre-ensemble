<?php

namespace App\Form;

use App\DTO\ContactDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom et Prénom',
                'attr' => [
                    'placeholder' => 'Votre nom et votre prénom',
                    'class' => 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#26A69A] focus:border-transparent transition-all'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Adresse email',
                'required' => false,
                'attr' => [
                    'placeholder' => 'email',
                    'class' => 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#26A69A] focus:border-transparent transition-all',
                    'data-contact-form-target' => 'emailField',
                    'hidden' => 'hidden'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'attr' => [
                    'rows' => 6,
                    'placeholder' => 'Partagez votre remarque, suggestion ou question...',
                    'class' => 'w-full px-4 py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#26A69A] focus:border-transparent transition-all resize-none'
                ]
            ])
            ->add('recontact', CheckboxType::class, [
                'label' => 'Je souhaite être recontacté(e)',
                'required' => false,
                'label_attr' => ['class' => 'custom-checkbox-label'],
                'attr' => [
                    'class' => 'custom-checkbox w-5 h-5 text-[#26A69A] bg-gray-100 border-gray-300 rounded focus:ring-[#26A69A] focus:ring-2 cursor-pointer',
                    'data-contact-form-target' => 'recontactCheckbox',
                    'data-action' => 'change->contact-form#toggleEmail'
                ]

            ])
            // Honeypot caché pour les bots
            ->add('website', TextType::class, [
                'label' => false,
                'required' => false,
                'mapped' => true,
                'attr' => [
                    'class' => 'hidden-field',
                    'tabindex' => '-1',
                    'autocomplete' => 'off',
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ContactDTO::class,
        ]);
    }
}
