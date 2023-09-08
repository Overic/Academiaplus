<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', TextType::class, [
                'attr' => [
                'class' => 'form-control validate',
                'minlength' => '3',
                'maxlength' => '50'
                ],
                'label' => 'Email Adress',
                'label_attr' => [
                'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('nom', TextType::class, [
                'attr' => [
                'class' => 'form-control validate',
                'minlength' => '3',
                'maxlength' => '50'
                ],
                'label' => 'Name',
                'label_attr' => [
                'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                'class' => 'form-control validate',
                'minlength' => '3',
                'maxlength' => '50'
                ],
                'label' => 'Uername',
                'label_attr' => [
                'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
