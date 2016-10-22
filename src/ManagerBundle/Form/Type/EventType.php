<?php
namespace ManagerBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;




class EventType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('save', SubmitType::class, array('label' => 'Create Event'));
        $builder->add('start', DateTimeType::class,array('data' => new \DateTime(),'required' => true));
        $builder->add('stop', DateTimeType::class,array('data' => new \DateTime(),'required' => false));
        $builder->add('notFinished', CheckboxType::class,array("mapped"=>false,'required' => false));
        $builder->add('description');

        $builder->add('events_elements', CollectionType::class, array(
            'entry_type' => ElementType::class,
            'allow_add'    => true,
        ));
        $builder->add('events_states', CollectionType::class, array(
            'entry_type' => StateType::class,
            'allow_add'    => true,
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerBundle\Entity\NPMEvent',
        ));
    }
}