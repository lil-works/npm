<?php

namespace ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Descriptor;

use ManagerBundle\Filter\DescriptorFilterType;


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
        $simpleLiveEditor    = $this->get('app.simpleLiveEditor');
        $formFilter = $this->get('form.factory')->create(DescriptorFilterType::class);

        $qb = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Descriptor')
            ->createQueryBuilder('d')
            ->select('d')


        ;
        if ($request->query->has($formFilter->getName())) {

            // manually bind values from the request
            $formFilter->submit($request->query->get($formFilter->getName()));

            // initialize a query builder
            $filterBuilder = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->createQueryBuilder('d')
                ;

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
            ->setTitle($seoPage->getTitle() . " Manager • Descriptors")
            ->addMeta('name', 'description', "List of descriptor")
        ;

        return $this->render('ManagerBundle:Descriptor:index.html.twig', array(
            'pagination' => $pagination,
            'simple_live_editor'=>$simpleLiveEditor,
            'formFilter'=>$formFilter->createView()
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

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle( $seoPage->getTitle() . " - Manager • New descriptor")
            ->addMeta('name', 'description', "List of descriptors")
        ;

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

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle( $seoPage->getTitle() . " - Manager • Descriptor #".$descriptor->getLabel())
            ->addMeta('name', 'description', "Show descriptor")
        ;
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

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle( $seoPage->getTitle() . " - Manager • Edit descriptor #".$descriptor->getLabel())
            ->addMeta('name', 'description', "Edit descriptor")
        ;

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
