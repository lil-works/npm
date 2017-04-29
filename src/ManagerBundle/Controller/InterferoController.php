<?php

namespace ManagerBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use AppBundle\Entity\Interfero;



/**
 * Synonym controller.

 */
class InterferoController extends Controller
{


    /**
     * get current interfero
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Manager • current interfero")
            ->addMeta('name', 'description', "current interfero")
        ;

        $em = $this->getDoctrine()->getManager();
        $currentInterfero = $em->getRepository('AppBundle:Interfero')->findAll();


        return $this->render('ManagerBundle:Interfero:index.html.twig', array(
            "currentInterfero"=>$currentInterfero
        ));
    }

    public function newAction(Request $request)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • Create interfero")
            ->addMeta('name', 'description', "Create a interfero")
        ;

        $interfero = new Interfero();

        $form = $this->createForm('ManagerBundle\Form\InterferoType', $interfero);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $interfero->setAntenna($datas->getAntenna());
            $interfero->setBand($datas->getBand());
            $interfero->setAvailable($datas->getAvailable());
            $em->persist($interfero);
            $em->flush();

            return $this->redirectToRoute('manager_interfero');
        }



        return $this->render('ManagerBundle:Interfero:new.html.twig', array(
            'interfero' => $interfero,
            'form' => $form->createView(),
        ));
    }
    public function editAction(Request $request,$id)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • edit interfero")
            ->addMeta('name', 'description', "edit a interfero")
        ;


        $em = $this->getDoctrine()->getManager();
        $interfero = $em->getRepository('AppBundle:Interfero')->find($id);

        $form = $this->createForm('ManagerBundle\Form\InterferoType', $interfero);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $datas = $form->getData();
            $em = $this->getDoctrine()->getManager();

            $interfero->setAntenna($datas->getAntenna());
            $interfero->setBand($datas->getBand());
            $interfero->setAvailable($datas->getAvailable());

            $em->flush();

            return $this->redirectToRoute('manager_interfero');
        }



        return $this->render('ManagerBundle:Interfero:new.html.twig', array(
            'form' => $form->createView()
        ));
    }

    public function deleteAction(Request $request,$id)
    {
        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " • delete interfero")
            ->addMeta('name', 'description', "delete a interfero")
        ;


        $em = $this->getDoctrine()->getManager();
        $interfero = $em->getRepository('AppBundle:Interfero')->find($id);

        if (!$interfero) {
            throw $this->createNotFoundException('No interfero found');
        }


            $em->remove($interfero);
            $em->flush();


        return $this->redirectToRoute('manager_interfero');

    }
}
