<?php

namespace ManagerBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;





class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('ManagerBundle:Default:index.html.twig', array(
            "title"=>"Noema Pareto Manager"
        ));
    }
    public function menuAction()
    {
        return $this->render('ManagerBundle:Default:menu.html.twig');
    }

}
