<?php

namespace App\Form;

use App\Entity\Oeuvre;
use App\Entity\Etat;
use App\Entity\Type;
use App\Entity\Position;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;


class OeuvreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', TextType::class)
            ->add('img', FileType::class, [
                'required' => false
            ])
            ->add('description')           
            ->add('longueur')
            ->add('largeur')
            ->add('hauteur')
            ->add('diametre')
            ->add('periodcreation')
            /*->add('artistes')*/
            /*->add('expositions')*/
            ->add('type',EntityType::class,[
                'class' => Type::class,
                'choice_label' => 'libelle',
                'expanded'=> false,
                'multiple' => false
            ])
            ->add('etat',EntityType::class,[
                'class' => Etat::class,
                'choice_label' => 'libelleetat',
                'expanded'=> false,
                'multiple' => false
            ])
            ->add('position',EntityType::class,[
                'class' => Position::class,
                'choice_label' => 'libelleposition',
                'expanded'=> false,
                'multiple' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Oeuvre::class,
        ]);
    }
}
