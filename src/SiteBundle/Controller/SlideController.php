<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SlideController extends Controller
{
    public function indexAction()
    {
        return $this->render('SiteBundle:Slide:index.html.twig');
    }
}
