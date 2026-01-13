<?php

namespace App\Form;

use App\Entity\Enum\NiveauRecetteEnum;
use App\Entity\Recette;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\Positive;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'nom',
                TextType::class,
                [
                    'attr' => [],
                    'label' => 'Nom de la recette',
                    'constraints' => [
                        new NotBlank(),
                        new Length(max: 255),
                    ],
                ]
            )
            ->add(
                'niveau',
                EnumType::class,
                options: [
                    'class' => NiveauRecetteEnum::class,
                    'label' => 'Niveau de difficulté',
                    'required' => false,
                ]
            )
            ->add(
                'nombrePersonnes',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 1,
                        'max' => 10,
                    ],
                    'label' => 'Nombre de personnes',
                    'required' => false,
                    'constraints' => [
                        new Positive(),
                        new LessThanOrEqual(value: 10),
                    ],
                ]
            )
            ->add(
                'tempsPreparation',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 1,
                    ],
                    'label' => 'Temps de preparation',
                    'constraints' => [
                        new NotNull(),
                        new Positive(),
                    ],
                ]
            )
            ->add(
                'tempsCuisson',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 1,
                    ],
                    'label' => 'Temps de cuisson',
                    'required' => false,
                    'constraints' => [
                        new Positive(),
                    ],
                ]
            )
            ->add(
                'tempsRepos',
                IntegerType::class,
                [
                    'attr' => [
                        'min' => 1,
                    ],
                    'label' => 'Temps de repos',
                    'required' => false,
                    'constraints' => [
                        new Positive(),
                    ],
                ]
            )
            ->add(
                child: 'submit',
                type: SubmitType::class,
                options: [
                    'label' => 'Enregistrer',
                ]
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
