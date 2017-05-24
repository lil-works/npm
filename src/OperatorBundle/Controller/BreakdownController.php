<?php

namespace OperatorBundle\Controller;

use AppBundle\Entity\BoringMachine;
use DoctrineExtensions\Query\Mysql\Date;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Breakdown;
use OperatorBundle\Form\BreakdownType;
use OperatorBundle\Filter\BreakdownFilterType;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use \DateTime;

/**
 * Breakdown controller.
 */
class BreakdownController extends Controller
{
    /**
     * Lists all Breakdown entities.
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $simpleLiveEditor    = $this->get('app.simpleLiveEditor');
        $formFilter = $this->get('form.factory')->create(BreakdownFilterType::class);

        $qb = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Breakdown')
            ->createQueryBuilder('b')
            ->select('b,TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) as breakdown_length');

        if ($request->query->has($formFilter->getName())) {

            // manually bind values from the request
            $formFilter->submit($request->query->get($formFilter->getName()));

            // initialize a query builder
            $filterBuilder = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Breakdown')
                ->createQueryBuilder('b')
                ->select('b,TIME_TO_SEC(TIMEDIFF(b.stop, b.start)) as breakdown_length');

            // build the query from the given form object
            $qb = $this->get('lexik_form_filter.query_builder_updater')->addFilterConditions($formFilter, $filterBuilder);
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            10
        );

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Operator • Breakdowns")
            ->addMeta('name', 'description', "List of breakdowns")
        ;

        return $this->render('OperatorBundle:Breakdown:index.html.twig', array(
            'pagination' => $pagination,
            'simple_live_editor'=>$simpleLiveEditor,
            'formFilter'=>$formFilter->createView()
        ));
    }

    /**
     * Lists all Breakdown entities in timeline.
     */
    public function timelineAction()
    {
        $em = $this->getDoctrine()->getManager();

        $start = new DateTime('-3 week');
        $stop = new DateTime('+1 week');

        $breakdowns = $em->getRepository('AppBundle:Breakdown')->findAll();

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Operator • Timeline")
            ->addMeta('name', 'description', "List of breakdowns in timeline")
        ;

        return $this->render('OperatorBundle:Breakdown:timeline.html.twig', array(
            'breakdowns' => $breakdowns,
            'start'=>$start,
            'stop'=>$stop,
        ));
    }
    /**
     * Creates a new Breakdown entity.
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $breakdown = new Breakdown();
        $form = $this->createForm('OperatorBundle\Form\BreakdownType', $breakdown);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($user = $this->getUser()) {
                $breakdown->setCreatedBy($user);
            }
            $em->persist($breakdown);
            $em->flush();

            $seoPage = $this->container->get('sonata.seo.page');
            $seoPage
                ->setTitle($seoPage->getTitle() . " Operator • Create Breakdown")
                ->addMeta('name', 'description', "Create new breakdown")
            ;

            return $this->redirectToRoute('operator_breakdown_show', array('id' => $breakdown->getId()));
        }

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Operator • Create Breakdown")
            ->addMeta('name', 'description', "Create breakdown")
        ;

        return $this->render('OperatorBundle:Breakdown:new.html.twig', array(
            'breakdown' => $breakdown,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Breakdown entity.
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function showAction(Breakdown $breakdown)
    {
        $deleteForm = $this->createDeleteForm($breakdown);


        $nodes = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Breakdown')
            ->nodes($breakdown);


        $nodes = json_encode($nodes);


        $seoPage = $this->get('sonata.seo.page');
        $seoPage->setTitle('Breakdown show');

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Operator • Breakdown #".$breakdown->getId())
            ->addMeta('name', 'description', "Show breakdown")
        ;


        return $this->render('OperatorBundle:Breakdown:show.html.twig', array(
            'breakdown' => $breakdown,
            'nodes'=>$nodes,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Breakdown entity.
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Breakdown $breakdown)
    {
        $deleteForm = $this->createDeleteForm($breakdown);
        $editForm = $this->createForm('OperatorBundle\Form\BreakdownType', $breakdown);
        $editForm->handleRequest($request);
/*
        $oldBreakdown  = $this->getDoctrine()
            ->getRepository('AppBundle:Breakdown')
            ->find($breakdown->getId());
*/
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($user = $this->getUser()){
                $boringMachine = new BoringMachine();
                $boringMachine->setCreatedBy($user);
                $boringMachine->setBreakdown($breakdown);

                //$encoders = array(new XmlEncoder(), new JsonEncoder());
                //$normalizers = array(new ObjectNormalizer());
                //$serializer = new Serializer($normalizers, $encoders);
                //$boringMachine->setBreakdownBefore($serializer->serialize($oldBreakdown, 'json'));
                //$boringMachine->setBreakdownAfter($serializer->serialize($breakdown, 'json'));

                $em->persist($boringMachine);
            }
            $em->persist($breakdown);
            $em->flush();

            return $this->redirectToRoute('operator_breakdown_show', array('id' => $breakdown->getId()));
        }

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Operator • Edit Breakdown #".$breakdown->getId())
            ->addMeta('name', 'description', "Edit breakdown")
        ;
        return $this->render('OperatorBundle:Breakdown:edit.html.twig', array(
            'breakdown' => $breakdown,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }




    /**
     * Deletes a Breakdown entity.
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Breakdown $breakdown)
    {


        $em = $this->getDoctrine()->getManager();
        $em->remove($breakdown);
        $em->flush();


        return $this->redirectToRoute('operator_breakdown');
    }

    /**
     * Creates a form to delete a Breakdown entity.
     *
     * @param Breakdown $breakdown The Breakdown entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Breakdown $breakdown)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operator_breakdown_delete', array('id' => $breakdown->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
