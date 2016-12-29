<?php

namespace MapsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Doctrine\ORM\EntityRepository;

class DeplacementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('date',DateType::class, array('widget' => 'single_text'))
            ->add('villedepart', EntityType::class, array(
                'class' => 'MapsBundle:Localisation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.city', 'ASC');
                },
                'choice_label' => 'city',
                'choice_value'=> 'city',
            ))
            ->add('villearrivee', EntityType::class, array(
                'class' => 'MapsBundle:Localisation',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->orderBy('u.city', 'ASC');
                },
                'choice_label' => 'city',
                'choice_value'=> 'city',
            ));

    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MapsBundle\Entity\Deplacement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'mapsbundle_deplacement';
    }


}
