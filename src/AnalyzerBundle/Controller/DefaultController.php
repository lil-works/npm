<?php

namespace AnalyzerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AnalyzerBundle\Filter\DescriptorTreeFilter;
use \DateTime;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lastBreakdowns = $em->getRepository('AppBundle:Breakdown')->findLast(10);
        $breakdowns = $em->getRepository('AppBundle:Breakdown')->findAll();
        return $this->render('AnalyzerBundle:Default:index.html.twig',
            array(
                "lastBreakdowns"=>$lastBreakdowns,
                "breakdowns"=>$breakdowns
            )
        );
    }

    public function menuAction()
    {
        return $this->render('AnalyzerBundle:Default:menu.html.twig');
    }

    public function descriptorBarAction(Request $request)
    {




        $em = $this->getDoctrine()->getManager();


        $form = $this->get('form.factory')->create(DescriptorTreeFilter::class);
        $nodes2 = $nodes = $edges = $edges2 = $descriptors  = null;
        $breakdowns = array();
        if ($request->query->has($form->getName())) {
            $form->submit($request->query->get($form->getName()));
            $data = $form->getData();
            $edges = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerEdges($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"]);
            $edgesWithDoublon = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerEdgesWithDoublon($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"]);


            $nodes = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerNodes($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"]);
            foreach($nodes as $node){
                foreach( explode(',',$node["breakdownsField"]) as $breakdown ){
                    if(!in_array($breakdown,$breakdowns)){
                        array_push($breakdowns,$breakdown);
                    }
                }
            }
            $nodes2 = $nodes;
            $edges2 = $edgesWithDoublon;


            $tmpEdges2 = array();
            foreach($edges2 as $e){
                if(!isset($tmpEdges2[$e['fromField']])){
                    $tmpEdges2[$e['fromField']] = array();
                }
                array_push($tmpEdges2[$e['fromField']],array(
                    $em->getRepository('AppBundle:Descriptor')->find($e['toField']),$e['valueField']
                ));
                sort($tmpEdges2[$e['fromField']]);
            }

            $edges2 = $tmpEdges2;

            $nodes = json_encode($nodes);
            $edges = json_encode($edges);


            //var_dump($data["timePonderation"],$data["interferoPonderation"]);
            $descriptors = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerFindAll($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"],$data["interferoPonderation"],$data["timePonderation"]);
            foreach($descriptors as $descriptor){
                foreach( explode(',',$descriptor["breakdownsList"]) as $breakdown ){
                    if(!in_array($breakdown,$breakdowns)){
                        array_push($breakdowns,$breakdown);
                    }
                }
            }

        }

        return $this->render('AnalyzerBundle:Default:descriptorBar.html.twig',
            array(
                'breakdowns'=>$breakdowns,
                'descriptors'=>json_encode($descriptors),
                'descriptors2'=>$descriptors,
                'nodes2'=>$nodes2,
                'edges2'=>$edges2,
                'nodes'=>$nodes,
                'edges'=>$edges,
                'form' => $form->createView()
            )
        );

    }
    /*
    public function descriptorTreeAction(Request $request)
    {
        $form = $this->get('form.factory')->create(DescriptorTreeFilter::class);

        $nodes = $edges = null;
        $breakdowns = array();

        if ($request->query->has($form->getName())) {

            $form->submit($request->query->get($form->getName()));

            $data = $form->getData();


            $edges = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerEdges2($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"]);
            $nodes = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerNodes2($data["category"],$data["start"],$data["stop"],$data["minDuration"],$data["maxDuration"]);

            foreach($nodes as $node){
                foreach( explode(',',$node["breakdownsField"]) as $breakdown ){
                    if(!in_array($breakdown,$breakdowns)){
                        array_push($breakdowns,$breakdown);
                    }
                }
            }
            $nodes = json_encode($nodes);
            $edges = json_encode($edges);
        }

        return $this->render('AnalyzerBundle:Default:descriptorTree.html.twig',
            array(
                'breakdowns'=>$breakdowns,
                'nodes'=>$nodes,
                'edges'=>$edges,
                'form' => $form->createView()
            )
        );
    }
*/
    public function breakdownTimelineAction()
    {
        $start = new DateTime('-3 week');
        $stop = new DateTime('+1 week');

        return $this->render('AnalyzerBundle:Default:breakdownTimeline.html.twig',array('start'=>$start,'stop'=>$stop));
    }
}
