<?php

namespace OperatorBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OperatorBundle:default:index.html.twig');
    }
    public function menuAction()
    {
        return $this->render('OperatorBundle:default:menu.html.twig');
    }
}
