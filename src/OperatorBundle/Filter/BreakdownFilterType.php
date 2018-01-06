<?php
namespace OperatorBundle\Filter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;
use Lexik\Bundle\FormFilterBundle\Filter\Condition\ConditionBuilderInterface;

class BreakdownFilterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('createdAt', Filters\DateRangeFilterType::class)
            #->add('breakdown_length', Filters\NumberFilterType::class)
            ->add('closed', Filters\BooleanFilterType::class)
            ->add('description', Filters\TextFilterType::class)
            ->add('createdBy', Filters\EntityFilterType::class, array(
                'class'    =>  'AppBundle:User',
                'multiple' =>  false,
                'expanded' => false,
                'choice_label' => function ($obj) { return   $obj->getUsername() ; },
            ))
            ->add('descriptors', Filters\EntityFilterType::class, array(
                'class'    =>  'AppBundle:Descriptor',
                'expanded' => false,
                'multiple' =>  true,
                'choice_label' => function ($obj) { return   $obj->getLabel() ; },
            ))

        ;
        //$builder->add('categories', new CategoriesFilterType());
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