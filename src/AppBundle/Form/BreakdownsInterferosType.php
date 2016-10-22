<?php

namespace AppBundle\Form;

use AppBundle\Entity\BreakdownsInterferos;
use AppBundle\Entity\InterferoRepository;
use AppBundle\Form\Type\OnoffType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class BreakdownsInterferosType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $breakdownInterfero = $event->getData();
            $form = $event->getForm();
            if ($breakdownInterfero instanceof BreakdownsInterferos) {
                $form->add('status',OnoffType::class,array(
                    'label'=>'Antenna '.$breakdownInterfero->getInterfero()->getAntenna().' Band '.$breakdownInterfero->getInterfero()->getBand(),
                    'attr'=>array('class'=>'statusClass','id'=>$breakdownInterfero->getInterfero()->getId())

                ));
                $form->add('id',HiddenType::class,array(
                    'mapped'=>false,
                    'attr'=>array('value'=>$breakdownInterfero->getInterfero()->getId()  )
                ));
            }
        });

        $builder
            ->add('id',HiddenType::class,array('mapped'=>false))
            ->add('status',OnoffType::class,array('label'=>'status'))
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\BreakdownsInterferos'
        ));
    }
}
