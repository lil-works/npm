<?php
namespace AnalyzerBundle\Filter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;



class DescriptorTreeFilter extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        //$builder->add('category', Filters\TextFilterType::class);
        $builder->add('category', EntityType::class, array(
        'choice_attr' => function($obj) {
            return ['category' => $obj->getId()];
        },
        'class'    => 'AppBundle:DescriptorCategory' ,
        'choice_label' => function ($obj) { return   $obj->getLabel() ; },
        'required' => true ,
        'mapped'=> true,
        'expanded' => true ,
        'multiple' => true
        ))
            ->add('start', DateTimeType::class,array('required' => false ))
            ->add('stop', DateTimeType::class,array('required' => false ))
            ->add('minDuration', integerType::class,array('required' => false ))
            ->add('maxDuration', integerType::class,array('required' => false ))
            ->add('durationUnity', ChoiceType::class,array('required' => true ,'choices'  => array(
                'second' => 'second',
                'minute' => 'minute',
                'hour' => 'hour',
                'day' => 'day',
                'week' => 'week'
            ),))
            ->add('timePonderation', ChoiceType::class,array('required' => true ,'choices'  => array(
                'off' => 'off',
                'on' => 'on'
            )))
            ->add('interferoPonderation', ChoiceType::class,array('required' => true ,'choices'  => array(
                'off' => 'off',
                'on' => 'on'
            )))
            ->add('minLimit', integerType::class,array('required' => false , 'data' => 0 ))
            ->add('maxLimit', integerType::class,array('required' => false, 'data' => 100 ))

        ;
    }

    public function getBlockPrefix()
    {
        return 'descriptorTree_filter';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}