<?php

namespace TLB\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SchoolType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('schoolName', TextType::class, array(
                'label' => 'Nom de l\'école',
                'required' => true,
            ))
            ->add('shortDescription', TextType::class, array(
                'label' => 'Description Courte',
                'required' => true,
            ))
            ->add('longDescritption', TextType::class, array(
                'label' => "Longue description",
                'required' => false,
            ))
            ->add('date', DateTimeType::class, array(
                'label' => "date d'entré",
                'date_format' => 'dd MMM y',
            ))
            ->add('schoolLogoFile', VichImageType::class, array(
                'label' => 'Télécharge le Logo de ton école',
                'required' => false,
                'download_link' => false,
             ))
        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TLB\CoreBundle\Entity\School'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tlb_corebundle_school';
    }


}
