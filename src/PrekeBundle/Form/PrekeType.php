<?php

namespace PrekeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PrekeType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pavadinimas')
            ->add('aprasymas')
            ->add('kaina')
            ->add('akcijineKaina')
            ->add('kategorija')
            ->add('likusiuKiekis')
            ->add('parduotuKiekis')
            ->add('busena')
            ->add('spalva')
            ->add('pagaminimoData', DateTimeType::class)
            ->add('kilmesSalis')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'PrekeBundle\Entity\Preke'
        ));
    }
}
