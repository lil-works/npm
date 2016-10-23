<?php

namespace OperatorBundle\Controller;

use AppBundle\Entity\BoringMachine;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Breakdown;
use OperatorBundle\Form\BreakdownType;
use OperatorBundle\Filter\BreakdownFilter;

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
        $form = $this->get('form.factory')->create(BreakdownFilter::class);

        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT
                a.id ,
                a.createdAt ,
                TIME_TO_SEC ( TIMEDIFF( a.stop, a.start )) as breakdown_length,
                a.start,
                a.stop,
                a.closed ,
                a.notFinished ,
                a.description,

                GROUP_CONCAT( DISTINCT b.label) as descriptors_element_list,
                GROUP_CONCAT( DISTINCT c.label) as descriptors_status_list,
                GROUP_CONCAT( DISTINCT d.label) as descriptors_action_list,
                GROUP_CONCAT( DISTINCT e.label) as descriptors_contributor_list,
                GROUP_CONCAT( DISTINCT f.label) as descriptors_list

                 FROM AppBundle:Breakdown a

                 LEFT JOIN a.descriptors b WITH b.category = 1
                 LEFT JOIN a.descriptors c WITH c.category = 2
                 LEFT JOIN a.descriptors d WITH d.category = 3
                 LEFT JOIN a.descriptors e WITH e.category = 4
                 LEFT JOIN a.descriptors f

                  GROUP BY a.id
                 ";
        $query = $em->createQuery($dql);
        //$query->setParameter('test', 100);
       // $query->setParameter('dcreated1', '2010-09-10');
       // $query->setParameter('dcreated2', '2020-09-11');
        //$query->setParameter('dstart1', '2010-08-01');
        //$query->setParameter('dstart2', '2020-09-01');
        //$query->setParameter('dstop1', '2010-08-01');
       // $query->setParameter('dstop2', '2020-09-01');
       // $query->setParameter('descriptor', '5');
        //$query->setParameter('closed', '1');
        //$query->setParameter('notFinished', '0');




        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            $data = $form->getData();
            $categories = array();
            /*foreach($data["category"]->toArray() as $category){
                array_push($categories,$category->getId());
            }

            $query->setParameter('categories', $categories);
            $query->setParameter('label', "%".$data["label"]."%");*/
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            100
        );
        return $this->render('OperatorBundle:breakdown:index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView()
        ));
    }



    /**
     * Lists all Breakdown entities in timeline.
     */
    public function timelineAction()
    {
        $em = $this->getDoctrine()->getManager();

        $breakdowns = $em->getRepository('AppBundle:Breakdown')->findAll();

        return $this->render('OperatorBundle:Breakdown:timeline.html.twig', array(
            'breakdowns' => $breakdowns,
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

            return $this->redirectToRoute('operator_breakdown_show', array('id' => $breakdown->getId()));
        }

        return $this->render('OperatorBundle:breakdown:new.html.twig', array(
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



        return $this->render('OperatorBundle:breakdown:show.html.twig', array(
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

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($user = $this->getUser()){
                $boringMachine = new BoringMachine();
                $boringMachine->setCreatedBy($user);
                $boringMachine->setBreakdown($breakdown);
                $em->persist($boringMachine);
            }
            $em->persist($breakdown);
            $em->flush();

            return $this->redirectToRoute('operator_breakdown_show', array('id' => $breakdown->getId()));
        }

        return $this->render('OperatorBundle:breakdown:edit.html.twig', array(
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
