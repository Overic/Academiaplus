<?php

namespace App\Form;

use App\Entity\Sexe;
use App\Entity\Niveau;
use App\Entity\Etudiant;
use App\Entity\Specialite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom',
                    'class' => 'form-control validate',
                    'minlength' => '3',
                    'maxlength' => '50'
                ],
                'label' => 'Nom',
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
                'placeholder' => 'Prenom',
                'class' => 'form-control validate',
                'minlength' => '3',
                'maxlength' => '50'
                ],
                'label' => 'Prenom',
                'label_attr' => [
                'class' => 'form-label'
                ],
                'constraints' => [
                    new Assert\Length(['min' => 3, 'max' => 50]),
                    new Assert\NotBlank()
                ]
            ])
            ->add('niveau', EntityType::class, [
                'placeholder' => 'Selectionner une valeur',
                'class' => Niveau::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control form-control-sm'],
                'required' => true,
                'label' => 'Niveau d\'etude',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('specialite', EntityType::class, [
                'placeholder' => 'Selectionner une valeur',
                'class' => Specialite::class,
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control form-control-sm'],
                'required' => true,
                'label' => 'Option',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
            ->add('sexe', EntityType::class, [
                'placeholder' => 'Selectionner une valeur',
                'class' => Sexe::class,
                'expanded' => 'true',
                'choice_label' => 'nom',
                'attr' => ['class' => 'form-control form-control-sm'],
                'required' => true,
                'label' => 'Sexe',
                'label_attr' => [
                    'class' => 'form-label',
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
        ]);
    }
}
