<?php

namespace ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Synonym;
use AppBundle\Entity\Descriptor;
use ManagerBundle\Filter\SynonymFilter;

/**
 * Synonym controller.

 */
class SynonymController extends Controller
{


    /**
     * Lists all Synonym entities.
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Manager • Synonym")
            ->addMeta('name', 'description', "List of synonym")
        ;

        $em = $this->getDoctrine()->getManager();

        $form = $this->get('form.factory')->create(SynonymFilter::class);

        $dql = "
            SELECT
                s,
                s.id as id,
                s.label as label ,
                d.id as descriptorId,
                d.label as descriptorLabel

            FROM AppBundle:Synonym s

            LEFT JOIN AppBundle:Descriptor d WITH d.id = s.descriptor
            WHERE s.label LIKE :label
            GROUP BY s.id
            HAVING descriptorLabel LIKE :descriptor OR :descriptor IS NULL
              ";

        $query = $em->createQuery($dql);
        $query->setParameter('label', '%%');
        $query->setParameter('descriptor', '%%');

        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            $data = $form->getData();
            $query->setParameter('label',"%" . $data['label'] . "%");
            $query->setParameter('descriptor', $data['descriptor']);
        }

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1),
            10,
            array('wrap-queries'=>true)
        );

        return $this->render('ManagerBundle:Synonym:index.html.twig', array(
            'pagination'=>$pagination,
            'form' => $form->createView(),
        ));
    }

    /**
     * Creates a new Synonym entity.
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • Create synonym")
            ->addMeta('name', 'description', "Create a synonym")
        ;

        $synonym = new Synonym();

        $form = $this->createForm('ManagerBundle\Form\SynonymType', $synonym);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if(strstr($synonym->getLabel(),",")){
                foreach(explode(",",$synonym->getLabel()) as $newLabel){
                    $newSynonym = new Synonym();
                    $newSynonym->setLabel($newLabel);
                    $newSynonym->setDescriptor($synonym->getDescriptor());
                    $em->persist($newSynonym);
                }
                $r = $this->redirectToRoute('manager_synonym_show_descriptor', array('id' => $synonym->getDescriptor()->getId()));
            }else{
                $em->persist($synonym);
                $r = $this->redirectToRoute('manager_synonym_show', array('id' => $synonym->getId()));
            }


            $em->flush();

            return $r;
        }

        return $this->render('ManagerBundle:Synonym:new.html.twig', array(
            'synonym' => $synonym,
            'form' => $form->createView(),
        ));
    }
    /**
     * Finds and displays a Synonym from Descriptor entity.
     * @ParamConverter("descriptor", class="AppBundle\Entity\Descriptor",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function descriptorAction(Request $request, Descriptor $descriptor)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • synonym for descriptor: ".$descriptor->getLabel())
            ->addMeta('name', 'description', "All synonyms for ".$descriptor->getLabel())
        ;


        $form = $this->createForm('ManagerBundle\Form\DescriptorSynonymType', $descriptor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            if(strstr($form["synonymList"]->getData(),",")){
                foreach(explode(",",$form["synonymList"]->getData()) as $newLabel){
                    $newSynonym = new Synonym();
                    $newSynonym->setLabel($newLabel);
                    $newSynonym->setDescriptor($descriptor);
                    $em->persist($newSynonym);
                }

            }else{
                $newSynonym = new Synonym();
                $newSynonym->setLabel($form["synonymList"]->getData());
                $newSynonym->setDescriptor($descriptor);
                $em->persist($newSynonym);

            }
            $em->flush();
        }
        return $this->render('ManagerBundle:Synonym:descriptor.html.twig', array(
            'descriptor' => $descriptor,
            'form' => $form->createView()

        ));
    }

    /**
     * Finds and displays a Synonym entity.
     * @ParamConverter("synonym", class="AppBundle\Entity\Synonym",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function showAction(Synonym $synonym)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • synonym: ".$synonym->getLabel())
            ->addMeta('name', 'description', "Details for ".$synonym->getLabel())
        ;

        $deleteForm = $this->createDeleteForm($synonym);

        return $this->render('ManagerBundle:Synonym:show.html.twig', array(
            'synonym' => $synonym,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Synonym entity.
     * @ParamConverter("synonym", class="AppBundle\Entity\Synonym",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Synonym $synonym)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • Edit synonym: ".$synonym->getLabel())
            ->addMeta('name', 'description', "Edit ".$synonym->getLabel())
        ;

        $deleteForm = $this->createDeleteForm($synonym);
        $editForm = $this->createForm('ManagerBundle\Form\SynonymType', $synonym);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($synonym);
            $em->flush();

            return $this->redirectToRoute('manager_synonym_edit', array('id' => $synonym->getId()));
        }

        return $this->render('ManagerBundle:Synonym:edit.html.twig', array(
            'synonym' => $synonym,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Synonym entity.
     * @ParamConverter("synonym", class="AppBundle\Entity\Synonym",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function deleteAction(Request $request, Synonym $synonym)
    {
        $form = $this->createDeleteForm($synonym);
        $form->handleRequest($request);

        //if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($synonym);
            $em->flush();
        //}

        return $this->redirectToRoute('manager_synonym');
    }

    /**
     * Creates a form to delete a Synonym entity.
     *
     * @param Synonym $synonym The Synonym entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Synonym $synonym)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('manager_synonym_delete', array('id' => $synonym->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
