<?php
/**
 * Created by PhpStorm.
 * User: lil-works
 * Date: 24/08/16
 * Time: 04:15
 */
namespace OperatorBundle\Twig;

class TimeDiffExtension extends \Twig_Extension
{

    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('timeDiff', array($this, 'timeDiffFilter')),
        );
    }

    public function timeDiffFilter($d1,$d2)
    {

        $timeDiff = $d1->diff($d2);

        if($timeDiff->days == 0){
            return $timeDiff->format('%h hours, %i min');
        }
        if($timeDiff->i == 0){
            return $timeDiff->format('%d days, %h hours');
        }
        return $timeDiff->format('%d days, %h hours, %i min');


    }

    public function getName()
    {
        return 'operator_timediff_extension';
    }
}