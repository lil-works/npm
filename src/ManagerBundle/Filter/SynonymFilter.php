<?php
namespace ManagerBundle\Filter;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Lexik\Bundle\FormFilterBundle\Filter\Form\Type as Filters;


class SynonymFilter extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder->add('label', TextType::class, array(
            'label'=>'search by label',
            'required' => false ,
            'mapped'=> true
        ))
            ->add('descriptor', TextType::class, array(
                'label'=>'search by descriptor',
                'required' => false ,
                'mapped'=> true
            ))



        ;
    }

    public function getBlockPrefix()
    {
        return 'synonym_filter';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection'   => false,
            'validation_groups' => array('filtering') // avoid NotBlank() constraint-related message
        ));
    }
}