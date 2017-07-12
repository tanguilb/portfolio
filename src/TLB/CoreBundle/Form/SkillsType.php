<?php

namespace TLB\CoreBundle\Form;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichFileType;
use Vich\UploaderBundle\Form\Type\VichImageType;

class SkillsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Nom de la compétence: ',
                'required' => 'true'
            ))
            ->add('description', TextType::class, array(
                'label' => 'Description : ',
                'required' => true,
            ))
            ->add('logoFile', VichImageType::class, array(
                'label' => "Téléchargement du logo",
                'required' => false,
                'download_link' => false,
            ))
            ->add('value', ChoiceType::class, array(
                'label' => 'Niveau de compétence : ',
                'choices' => array(
                  'Débutant' => 1,
                    'Amateur' => 2,
                    'Moyen' => 3,
                    'Confirmé' => 4,
                    'Excellent' => 5,
                    'Pro' => 6,
                ),
                'required' => true,
            ));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'TLB\CoreBundle\Entity\Skills'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'tlb_corebundle_skills';
    }


}
