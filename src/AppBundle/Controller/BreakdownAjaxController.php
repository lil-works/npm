<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Descriptor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class BreakdownAjaxController extends Controller
{
    /*
    public function addDescriptorAction(Request $request){
        $r =  json_decode($request->getContent());
        $em = $this->getDoctrine()->getManager();

        $json = array();

        foreach($r as $new){
            $new = json_decode($new);
            $category = $em->getRepository("AppBundle:DescriptorCategory")->find( $new[0]   );
            $descriptor = new Descriptor();
            $descriptor->setCategory($category);
            $descriptor->setLabel($new[1] );


            $em->persist($descriptor);
            $em->flush();

            array_push($json,array($new[2],$descriptor->getId()));
        }


        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }

    public function searchOneByLabelAction(Request $request){
        $r = $request->get('q');
        $em = $this->getDoctrine()->getManager();
        $element = $em->getRepository("AppBundle:Descriptor")->findOneByLabelAndCategoryWithSynonym( $r[0] ,$r[1]  );
        $json = array();
        if($element){
            $json['id'] = $element['id'];
            $json['label'] = $element['label'];
        }
        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }





    public function searchExactByLabelAction(Request $request){
        $r = $request->get('q');
        $em = $this->getDoctrine()->getManager();
        //$element = $em->getRepository("AppBundle:Descriptor")->findOneByLabelAndCategory( $r[0] ,$r[1]  );
        $element = $em->getRepository("AppBundle:Descriptor")->findOneByLabelAndCategoryWithSynonym( $r[0] ,$r[1]  );
        $json = array();
        if($element){
            $json['id'] = $element[0]['id'];
            $json['label'] = $element[0]['label'];
        }
        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }


    public function searchAllByLabelAction(Request $request){
        $r = $request->get('q');

        $em = $this->getDoctrine()->getManager();
        $elements = $em->getRepository("AppBundle:Descriptor")->findByLabelAndCategoryWithSynonym( $r[0] ,$r[1]  );

        $json = array();
        $i=0;
        foreach ($elements as $element) {
            $json[] = array(
                'id' => $element["id"],
                'label' =>$element["label"]
            );
            $i++;
        }
        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }
    */
}