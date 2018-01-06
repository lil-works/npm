<?php

namespace AppBundle\Form;

use AppBundle\Entity\BreakdownsInterferos;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
class BreakdownType extends AbstractType
{
    /** @var \Doctrine\ORM\EntityManager */
    private $em;

    /**
     * Constructor
     *
     * @param Doctrine $doctrine
     */
    public function __construct(\Doctrine\Bundle\DoctrineBundle\Registry $doctrine)
    {
        $this->em = $doctrine->getManager();
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $breakdown = $event->getData();
            if($breakdown->getId()){
                $interferos = $this->em->getRepository('AppBundle:BreakdownsInterferos')->findByBreakdown($breakdown->getId());
            }else{
                $interferos = $this->em->getRepository('AppBundle:Interfero')->findByAvailable(1);
                foreach($interferos as $interfero){
                    $bi = new BreakdownsInterferos();
                    $bi->setStatus(1);
                    $bi->setInterfero($interfero);
                    $bi->setBreakdown($breakdown);
                    $breakdown->addBreakdownsInterfero($bi);
                }
            }

        });



        $builder
            ->add('start', DateTimeType::class,array('required' => true))
            ->add('stop', DateTimeType::class,array('required' => false))
            ->add('notFinished')
            ->add('closed')
            ->add('description')


            ->add('descriptors', EntityType::class, array(
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

            ->add('breakdowns_interferos', CollectionType::class, array(
                'mapped'=>true,
                'allow_add'=>true,
                'required' => false,
                'entry_type'   => BreakdownsInterferosType::class,
                // these options are passed to each "email" type
                'entry_options'  => array(
                     'attr'      => array('class'=>'breakdowns_interferos-class')
                ),
            ))

           // ->add('creator')
           // ->add('descriptors')
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Breakdown'
        ));
    }
}
