<?php

namespace App\Form;

use App\Entity\Exposition;
use App\Entity\Oeuvre;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ExpositionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('poster', FileType::class, [
                'required' => false
            ])
            ->add('titre')
            ->add('description')           
            ->add('datedebut')
            ->add('datefin')
            ->add('nbvisiters')
            ->add('oeuvres',EntityType::class,[
                'class' => Oeuvre::class,
                'choice_label' => 'titre',
                'expanded'=> true,
                'multiple' => true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Exposition::class,
        ]);
    }
}
