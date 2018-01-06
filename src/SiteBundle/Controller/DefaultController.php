<?php

namespace SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • Homepage")
            ->addMeta('name', 'description', "Homepage")
        ;

        return $this->render('SiteBundle:Default:index.html.twig');
    }
}
