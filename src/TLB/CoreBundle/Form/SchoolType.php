<?php

namespace TLB\CoreBundle\Form;

use Symfony\Component\Form\AbstractType;
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
            ->add('schoolName')
            ->add('shortDescription')
            ->add('longDescritption')
            ->add('date')
            ->add('schoolLog', VichImageType::class, array(
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
