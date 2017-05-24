<?php

namespace AnalyzerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AnalyzerBundle\Filter\DescriptorTreeFilter;
use \DateTime;
use Symfony\Component\HttpFoundation\Response;
class DefaultController extends Controller
{

    function generateDistribution($datas,$scale){
        $formatedData = array();
        foreach($datas as $data){
            array_push($formatedData, intval($data['bLength']/$scale));
        }

        $output = array();
        foreach($formatedData as $v){
            if(!isset($output[$v])){
                $output[$v] = 1;
            }else{
                $output[$v]++;
            }
        }
        ksort($output);

        return $output;
    }

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $lastBreakdowns = $em->getRepository('AppBundle:Breakdown')->findLast(10);
        $breakdowns = $em->getRepository('AppBundle:Breakdown')->findBy(
            array('closed'=>1)
        );
        $stats = $em->getRepository('AppBundle:Breakdown')->findStats();

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Analyzer ")
            ->addMeta('name', 'description', "Analyzer some stats")
        ;


        $this->generateDistribution($stats['lengths'],60*60);

        return $this->render('AnalyzerBundle:Default:index.html.twig',
            array(
                "lastBreakdowns"=>$lastBreakdowns,
                "breakdowns"=>$breakdowns,
                "stats"=>$stats
            )
        );
    }
    public function helpAction()
    {
        $seoPage = $this->get('sonata.seo.page');
        $seoPage->setTitle('Analyzer help');

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Analyzer • Help")
            ->addMeta('name', 'description', "Some help for analyzers")
        ;

        return $this->render('AnalyzerBundle:Default:help.html.twig');
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


            $descriptors = $this->get('doctrine.orm.entity_manager')
                ->getRepository('AppBundle:Descriptor')
                ->AnalyzerFindAll($data);
            foreach($descriptors as $descriptor){
                foreach( explode(',',$descriptor["breakdownsList"]) as $breakdown ){
                    if(!in_array($breakdown,$breakdowns)){
                        array_push($breakdowns,$breakdown);
                    }
                }
            }

        }

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Analyzer • Tree/Bars")
            ->addMeta('name', 'description', "Analyze NPM datas")
        ;
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

    public function breakdownTimelineAction()
    {
        $start = new DateTime('-3 week');
        $stop = new DateTime('+1 week');

        $seoPage = $this->container->get('sonata.seo.page');
        $seoPage
            ->setTitle($seoPage->getTitle() . " Analyzer • Timeline")
            ->addMeta('name', 'description', "Closed breakdown in timeline")
        ;
        return $this->render('AnalyzerBundle:Default:breakdownTimeline.html.twig',array('start'=>$start,'stop'=>$stop));
    }
}
