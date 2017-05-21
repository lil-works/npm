<?php
namespace AppBundle\Form\Ajax\Breakdown;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;


class ClosedType extends AbstractType
{

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('closed',ChoiceType::class,array(
                'choices' => array(
                    'no' => 0,
                    'yes' => 1
                ),
                'label' => false,'required' => true))

            ->add('save', SubmitType::class, array(
            'attr' => array('class' => 'liveEditor_btn_save btn btn-success btn-sm'),
            ))
            ->add('cancel', ButtonType::class, array(
                'attr' => array('class' => 'liveEditor_btn_cancel btn btn-warning btn-sm'),
            ))

        ;
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Breakdown'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'lilworks_ajax_breakdown';
    }


}
