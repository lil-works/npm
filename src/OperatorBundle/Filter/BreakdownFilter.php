<?php
namespace OperatorBundle\Filter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class BreakdownFilter extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('closed', CheckboxType::class, array(
            'required' => false ,
            'mapped'=> true
        ))->add('descriptors', EntityType::class, array(
            'choice_attr' => function($obj) {
                return ['category' => $obj->getCategory()->getId()];
            },
            'class'    => 'AppBundle:Descriptor' ,
            'choice_label' => function ($obj) { return   $obj->getLabel() ; },
            'required' => true ,
            'mapped'=> true,
            'expanded' => false ,
            'multiple' => true
        ))


        ;
    }

    public function getBlockPrefix()
    {
        return 'descriptor_filter';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}