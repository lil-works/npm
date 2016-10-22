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
        return $timeDiff->format('%i minutes , %h hours , %d days');

    }

    public function getName()
    {
        return 'operator_timediff_extension';
    }
}