<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Etat;
use App\Entity\Type;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('img')
            ->add('description')           
            ->add('longueur')
            ->add('largeur')
            ->add('hauteur')
            ->add('diametre')
            ->add('periodcreation')
            ->add('artistes')
            /*->add('expositions')*/
            ->add('type',EntityType::class,[
                'class' => Type::class,
                'choice_label' => 'libelle',
                'expanded'=> true,
                'multiple' => false
            ])
            ->add('etat',EntityType::class,[
                'class' => Etat::class,
                'choice_label' => 'libelleetat',
                'expanded'=> true,
                'multiple' => false
            ])
            ->add('position')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
