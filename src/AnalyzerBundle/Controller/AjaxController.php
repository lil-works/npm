<?php

namespace AnalyzerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function getDescriptorsAction(Request $request,$category)
    {
        $em = $this->getDoctrine()->getManager();
        $descriptors = $em->getRepository('AppBundle:Descriptor')->AnalyzerFindAll($category);
        $response = new Response();
        $response->setContent(json_encode($descriptors));
        return $response;
    }
    public function getNodesAction(Request $request,$category)
    {
        $em = $this->getDoctrine()->getManager();
        $descriptors = $em->getRepository('AppBundle:Descriptor')->AnalyzerNodes($category);
        $response = new Response();
        $response->setContent(json_encode($descriptors));
        return $response;
    }
    public function getEdgesAction(Request $request,$category)
    {
        $em = $this->getDoctrine()->getManager();
        $descriptors = $em->getRepository('AppBundle:Descriptor')->AnalyzerEdges($category);
        $response = new Response();
        $response->setContent(json_encode($descriptors));
        return $response;
    }
    public function getBreakdownTimelineAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $descriptors = $em->getRepository('AppBundle:Breakdown')->AnalyzerTimeline();
        $response = new Response();
        $response->setContent(json_encode($descriptors));
        return $response;
    }
}
