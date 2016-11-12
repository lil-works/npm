<?php
namespace ManagerBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;


class EventForm extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder

            ->add('save', ButtonType::class, array('attr' => array('class' => 'save')))
            ->add('creator', HiddenType::class,array('required' => true))
            ->add('start', DateTimeType::class,array('data' => new \DateTime(),'required' => true))
            ->add('stop', DateTimeType::class,array('data' => new \DateTime(),'required' => false))
            ->add('notFinished', CheckboxType::class,array("mapped"=>true,'required' => false))
            ->add('events_elements' ,EntityType::class , array(

                'class'    => 'ManagerBundle:NPMElement' ,
                'choice_label' => function ($obj) { return   $obj->getLabel(); },
                'required' => true ,
                'mapped'=> false,
                'expanded' => true ,
                'multiple' => true  ))

            ->add('search_element', TextType::class,array("mapped"=>false,'required' => false))

            ->add('events_states' ,EntityType::class , array(
                'class'    => 'ManagerBundle:NPMState' ,
                'choice_label' => function ($obj) {
                    return   $obj->getLabel();
                },
                "mapped"=>false,
                'required' => false ,
                'expanded' => true ,
                'multiple' => true  ))

            ->add('search_state', TextType::class,array("mapped"=>false,'required' => false))
            ->add('events_actions' ,EntityType::class , array(
                'class'    => 'ManagerBundle:NPMAction' ,
                'choice_label' => function ($obj) {
                    return   $obj->getLabel();
                },
                "mapped"=>false,
                'required' => false ,
                'expanded' => true ,
                'multiple' => true  ))

            ->add('search_action', TextType::class,array("mapped"=>false,'required' => false))
            ->add('events_contributors' ,EntityType::class , array(
                'class'    => 'ManagerBundle:NPMContributor' ,
                'choice_label' => function ($obj) {
                    return   $obj->getLabel();
                },
                "mapped"=>false,
                'required' => false ,
                'expanded' => true ,
                'multiple' => true  ))

            ->add('search_contributor', TextType::class,array("mapped"=>false,'required' => false))
            ->add('description', TextareaType::class,array('required' => false))

            ->add('events_currentArrays' ,EntityType::class , array(
                'class'    => 'ManagerBundle:NPMCurrentArray' ,
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.available = 1');
                },
                'choice_label' => function ($obj) {
                    return  "antenna: " . $obj->getAntenna() . " band: " . $obj->getBand();
                },
                'mapped'=>false,
                'expanded' => true ,
                'multiple' => true  ))
        ;


    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ManagerBundle\Entity\NPMEvent',
            'allow_extra_fields'=>true
        ));
    }
}