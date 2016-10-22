<?php

namespace ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Synonym;
use AppBundle\Form\SynonymType;

/**
 * Synonym controller.

 */
class SynonymController extends Controller
{
    /**
     * Lists all Synonym entities.
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $synonyms = $em->getRepository('AppBundle:Synonym')->findAll();

        return $this->render('ManagerBundle:synonym:index.html.twig', array(
            'synonyms' => $synonyms,
        ));
    }

    /**
     * Creates a new Synonym entity.
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $synonym = new Synonym();
        $form = $this->createForm('AppBundle\Form\SynonymType', $synonym);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($synonym);
            $em->flush();

            return $this->redirectToRoute('manager_synonym_show', array('id' => $synonym->getId()));
        }

        return $this->render('ManagerBundle:synonym:new.html.twig', array(
            'synonym' => $synonym,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Synonym entity.
     * @ParamConverter("synonym", class="AppBundle\Entity\Synonym",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function showAction(Synonym $synonym)
    {
        $deleteForm = $this->createDeleteForm($synonym);

        return $this->render('ManagerBundle:synonym:show.html.twig', array(
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
        $deleteForm = $this->createDeleteForm($synonym);
        $editForm = $this->createForm('AppBundle\Form\SynonymType', $synonym);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($synonym);
            $em->flush();

            return $this->redirectToRoute('manager_synonym_edit', array('id' => $synonym->getId()));
        }

        return $this->render('ManagerBundle:synonym:edit.html.twig', array(
            'synonym' => $synonym,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Synonym entity.
     * @ParamConverter("synonym", class="AppBundle\Entity\Synonym",options={"mapping": {"id": "id"  }})
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Synonym $synonym)
    {
        $form = $this->createDeleteForm($synonym);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($synonym);
            $em->flush();
        }

        return $this->redirectToRoute('manager_synonym_index');
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
