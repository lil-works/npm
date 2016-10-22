<?php

namespace ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Descriptor;

use ManagerBundle\Filter\DescriptorFilter;


/**
 * Descriptor controller.
 */
class DescriptorController extends Controller
{
    /**
     * Lists all Descriptor entities.
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        $form = $this->get('form.factory')->create(DescriptorFilter::class);

        $em    = $this->get('doctrine.orm.entity_manager');
        $dql   = "SELECT
                a.id,
                a.label,
                b.label as category_label ,
                b.color,
                COUNT(DISTINCT c.id ) as synonym_count,
                GROUP_CONCAT( DISTINCT c.label ) as synonym_list,
                COUNT( DISTINCT d.id ) as breakdown_count,
                GROUP_CONCAT(DISTINCT d.id) as breakdown_list
                 FROM AppBundle:Descriptor a
                 LEFT JOIN a.breakdowns d
                 LEFT JOIN AppBundle:DescriptorCategory b WITH b.id = a.category
                 LEFT JOIN AppBundle:Synonym c WITH c.descriptor = a.id
                  WHERE a.category IN (:categories) AND a.label LIKE :label
                  GROUP BY  a.id";
        $query = $em->createQuery($dql);

        $query->setParameter('categories', '1,2,3,4');
        $query->setParameter('label', '%%');

        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            $data = $form->getData();
            $categories = array();
            foreach($data["category"]->toArray() as $category){
                array_push($categories,$category->getId());
            }

            $query->setParameter('categories', $categories);
            $query->setParameter('label', "%".$data["label"]."%");
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            20
        );
        return $this->render('ManagerBundle:Descriptor:index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView()
        ));
    }

    /**
     * Creates a new Descriptor entity.
     *
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $descriptor = new Descriptor();
        $form = $this->createForm('AppBundle\Form\DescriptorType', $descriptor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descriptor);
            $em->flush();

            return $this->redirectToRoute('manager_descriptor_show', array('id' => $descriptor->getId()));
        }

        return $this->render('ManagerBundle:Descriptor:new.html.twig', array(
            'descriptor' => $descriptor,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Descriptor entity.
     * @ParamConverter("descriptor", class="AppBundle\Entity\Descriptor",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function showAction(Descriptor $descriptor)
    {
        $deleteForm = $this->createDeleteForm($descriptor);

        $edges = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Descriptor')
            ->ManagerEdges($descriptor);
        $nodes = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Descriptor')
            ->ManagerNodes($descriptor);


        $nodes = json_encode($nodes);
        $edges = json_encode($edges);


        return $this->render('ManagerBundle:Descriptor:show.html.twig', array(
            'descriptor' => $descriptor,
            'delete_form' => $deleteForm->createView(),
            'nodes'=>$nodes,
            'edges'=>$edges,
        ));
    }

    /**
     * Displays a form to edit an existing Descriptor entity.
     * @ParamConverter("descriptor", class="AppBundle\Entity\Descriptor",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Descriptor $descriptor)
    {
        $deleteForm = $this->createDeleteForm($descriptor);
        $editForm = $this->createForm('AppBundle\Form\DescriptorType', $descriptor);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($descriptor);
            $em->flush();

            return $this->redirectToRoute('manager_descriptor_edit', array('id' => $descriptor->getId()));
        }

        return $this->render('ManagerBundle:Descriptor:edit.html.twig', array(
            'descriptor' => $descriptor,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Descriptor entity.
     * @ParamConverter("descriptor", class="AppBundle\Entity\Descriptor",options={"mapping": {"id": "id"  }})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Descriptor $descriptor)
    {
        //var_dump($descriptor->getId());
        $form = $this->createDeleteForm($descriptor);
        $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($descriptor);
            $em->flush();
        //}

        return $this->redirectToRoute('manager_descriptor');
    }

    /**
     * Creates a form to delete a Descriptor entity.
     *
     * @param Descriptor $descriptor The Descriptor entity
     * @ParamConverter("descriptor", class="AppBundle\Entity\Descriptor",options={"mapping": {"id": "id"  }})
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Descriptor $descriptor)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_descriptor_delete', array('id' => $descriptor->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
