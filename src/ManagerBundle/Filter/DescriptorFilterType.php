<?php
namespace ManagerBundle\Filter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Lexik\Bundle\FormFilterBundle\Filter\Condition\ConditionBuilderInterface;

class DescriptorFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('label', Filters\TextFilterType::class)
            ->add('category', Filters\EntityFilterType::class, array(
                'class'    =>  'AppBundle:DescriptorCategory',
                'multiple' =>  true,
                'expanded' => true,
                'choice_label' => function ($obj) { return   $obj->getLabel() ; },
            ))


        ;

    }

    public function getBlockPrefix()
    {
        return 'item_filter';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message

        ));
    }
}