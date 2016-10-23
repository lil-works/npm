<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

use AppBundle\Entity\Breakdown;
use AppBundle\Form\BreakdownType;

/**
 * Breakdown controller.
 *
 * @Route("/breakdown")
 */
class BreakdownController extends Controller
{
    /**
     * Lists all Breakdown entities.
     *
     * @Route("/", name="breakdown_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $breakdowns = $em->getRepository('AppBundle:Breakdown')->findAll();

        return $this->render('breakdown/index.html.twig', array(
            'breakdowns' => $breakdowns,
        ));
    }

    /**
     * Creates a new Breakdown entity.
     *
     * @Route("/new", name="breakdown_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {

        $breakdown = new Breakdown();
        $form = $this->createForm('AppBundle\Form\BreakdownType', $breakdown);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($breakdown);
            $em->flush();

            return $this->redirectToRoute('breakdown_show', array('id' => $breakdown->getId()));
        }

        return $this->render('breakdown/new.html.twig', array(
            'breakdown' => $breakdown,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Breakdown entity.
     *
     * @Route("/{id}", name="breakdown_show")
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method("GET")
     */
    public function showAction(Breakdown $breakdown)
    {
        $deleteForm = $this->createDeleteForm($breakdown);

        return $this->render('breakdown/show.html.twig', array(
            'breakdown' => $breakdown,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Breakdown entity.
     *
     * @Route("/{id}/edit", name="breakdown_edit")
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Breakdown $breakdown)
    {
        $deleteForm = $this->createDeleteForm($breakdown);
        $editForm = $this->createForm('AppBundle\Form\BreakdownType', $breakdown);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($breakdown);
            $em->flush();

            return $this->redirectToRoute('breakdown_edit', array('id' => $breakdown->getId()));
        }

        return $this->render('breakdown/edit.html.twig', array(
            'breakdown' => $breakdown,
            'form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Breakdown entity.
     *
     * @Route("/{id}/delete", name="breakdown_delete")
     * @ParamConverter("breakdown", class="AppBundle\Entity\Breakdown",options={"mapping": {"id": "id"  }})
     * @Method({"GET", "POST"})
     */
    public function deleteAction(Request $request, Breakdown $breakdown)
    {

        $em = $this->getDoctrine()->getManager();
        $em->remove($breakdown);
        $em->flush();


        return $this->redirectToRoute('breakdown_index');
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
            ->setAction($this->generateUrl('breakdown_delete', array('id' => $breakdown->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
