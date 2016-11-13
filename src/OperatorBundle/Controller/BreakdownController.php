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

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;

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
        $em    = $this->get('doctrine.orm.entity_manager');



        $form = $this->get('form.factory')->create(BreakdownFilter::class);
        $dql   = "SELECT
                a,
                a.id ,
                a.createdAt ,

                u.name as createdBy ,
                TIME_TO_SEC ( TIMEDIFF( a.stop, a.start )) as breakdown_length,
                a.start,
                a.stop,
                a.closed ,
                a.description,


                GROUP_CONCAT( d.label) as descriptors_list,
                GROUP_CONCAT( d.id SEPARATOR '####') as descriptors_list_id,
                GROUP_CONCAT( c.label ) as descriptors_list_category_label,
                GROUP_CONCAT( c.color ) as descriptors_list_category_color

                 FROM AppBundle:Breakdown a
                 LEFT JOIN AppBundle:User u WITH u.id = a.createdBy
                 LEFT JOIN a.descriptors d
                  LEFT JOIN d.category c
                  GROUP BY a.id
                  HAVING
                  IF(:closed IS NOT NULL,:closed,'%') = a.closed
                  AND REGEXP(GROUP_CONCAT( DISTINCT d.id SEPARATOR '##'), :descriptors) = true
                  AND ( a.createdAt IN (:createdBy) OR IF(:haveCreatedBy IS NULL , 'yes' ,'no') = 'yes' )
                 ";
        $query = $em->createQuery($dql);

       // $query->setParameter('dcreated1', '2010-09-10');
       // $query->setParameter('dcreated2', '2020-09-11');
        //$query->setParameter('dstart1', '2010-08-01');
        //$query->setParameter('dstart2', '2020-09-01');
        //$query->setParameter('dstop1', '2010-08-01');
       // $query->setParameter('dstop2', '2020-09-01');
       // $query->setParameter('descriptor', '5');
        $query->setParameter('closed', null);
        $query->setParameter('descriptors', "#");

        $query->setParameter('createdBy', null);
        $query->setParameter('haveCreatedBy', null);




        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            $data = $form->getData();

            if(count($data["createdBy"])>0) {
                $query->setParameter('createdBy', $data["createdBy"]);
                $query->setParameter('haveCreatedBy', 1);
            }

            $query->setParameter('closed', $data["closed"]);
            if(count($data["descriptors"])>0){
                $aDescriptor = array();
                foreach($data["descriptors"] as $descriptor){
                    array_push($aDescriptor,$descriptor->getId());
                }
var_dump('#'.implode("#|#",$aDescriptor).'#');
                $query->setParameter('descriptors', '#'.implode("#|#",$aDescriptor).'#');
            }
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10,
            array('wrap-queries'=>true)
        );
        return $this->render('OperatorBundle:Breakdown:index.html.twig', array(
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
