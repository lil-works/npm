<?php
namespace AppBundle\Twig;

class AppExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('descriptor', array($this, 'descriptorFilter')),
            new \Twig_SimpleFilter('descriptorListSorter', array($this, 'descriptorListSorter')),
            new \Twig_SimpleFilter('timelength', array($this, 'timelengthConverter')),
        );
    }
    private function secondsToTime($seconds) {
        $dtF = new \DateTime('@0');
        $dtT = new \DateTime("@$seconds");
        return $dtF->diff($dtT)->format('%a days, %h hours, %i minutes and %s seconds');
    }
    public function timelengthConverter($seconds)
    {

        return  $this->secondsToTime(intval($seconds));
    }
    public function descriptorListSorter($descriptors,$categoryLabels,$categoryColors)
    {
        $ad = explode(',',$descriptors);
        $ac = explode(',',$categoryLabels);
        $acolor = explode(',',$categoryColors);
        $o = array();
        $a = array(
            'element'=>array(),
            'status'=>array(),
            'action'=>array(),
            'contributor'=>array()
        );
        foreach($ad as $k=>$descriptor){
            array_push(
                $a[$ac[$k]],
                array("label"=>$descriptor,"color"=>$acolor[$k])
            );
        }
        foreach($a as $k=>$v){
            foreach($v as $v2){
                array_push($o,$v2);
            }
        }
        return $o;
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