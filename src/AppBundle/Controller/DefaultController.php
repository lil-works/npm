<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Filter\ItemFilterType;


class DefaultController extends Controller
{
    /**
     * @Route("/home", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ]);
    }
    /**
     * @Route("/", name="test")
     */
    public function testFilterAction(Request $request)
    {
        $form = $this->get('form.factory')->create( ItemFilterType::class );



        //if ($request->query->has($form->getName())) {

            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));

            // initialize a query builder
            $filterBuilder = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:MyEntity')
                ->createQueryBuilder('e');

            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);

            // now look at the DQL =)
        var_dump($filterBuilder->getQuery()->getSql());
        var_dump($filterBuilder->getQuery()->getParameters());

        //}

        return $this->render('AppBundle:Default:testFilter.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
     * @Route("/list2", name="list2")
     */
    public function list2Action(Request $request)
    {
        // initialize a query builder
        $filterBuilder = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:MyEntity')
            ->createQueryBuilder('e');

        $form = $this->get('form.factory')->create(ItemFilterType::class);

        if ($request->query->has($form->getName())) {
            // manually bind values from the request
            $form->submit($request->query->get($form->getName()));

            // build the query from the given form object
            $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($form, $filterBuilder);
        }

        $query = $filterBuilder->getQuery();

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->get('page', 1)/*page number*/,
            10/*limit per page*/
        );

        return $this->render('AppBundle:Default:list.html.twig', array(
            'form' => $form->createView(),
            'pagination' => $pagination
        ));
    }

    /**
     * @Route("/list", name="list")
     */
    public function listAction(Request $request)
    {
        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT a FROM AppBundle:MyEntity a";
        $query = $em->createQuery($dql);

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            10/*limit per page*/
        );

        // parameters to template
        return $this->render('AppBundle:Default:list.html.twig', array('pagination' => $pagination));
    }




}
