<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('descriptor', array($this, 'descriptorFilter')),
        );
    }

    public function descriptorFilter($descriptors)
    {
        $o = array();
        $a = array(
            'element'=>array(),
            'status'=>array(),
            'action'=>array(),
            'contributor'=>array()
        );
        foreach($descriptors as $descriptor){
            array_push(
                $a[$descriptor->getCategory()->getLabel()],
                $descriptor
            );
        }
        foreach($a as $k=>$v){
            foreach($v as $v2){
                array_push($o,$v2);
            }
        }
        return $o;
    }

    public function getName()
    {
        return 'app_extension';
    }
}