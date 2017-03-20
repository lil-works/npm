<?php
namespace OperatorBundle\Controller;

use AppBundle\Entity\Descriptor;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    public function breakdownShowAction(Request $request ,$id){
        $em = $this->getDoctrine()->getManager();

        $breakdown = $em->getRepository('AppBundle:Breakdown')->find($id);

        return $this->render('OperatorBundle:Ajax:breakdownShow.html.twig', array(
            'breakdown' => $breakdown,
        ));
    }
    public function descriptorShowAction(Request $request ,$id){
        $em = $this->getDoctrine()->getManager();
        $descriptor = $em->getRepository('AppBundle:Descriptor')->find($id);



        return $this->render('OperatorBundle:Ajax:descriptorShow.html.twig', array(
            'descriptor' => $descriptor,
        ));


    }
    public function timelineAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $descriptors = $em->getRepository('AppBundle:Breakdown')->OperatorTimeline();
        $response = new Response();
        $response->setContent(json_encode($descriptors));
        return $response;
    }
    public function searchMatchingSequenceAction(Request $request){
        $r = $request->get('q');
        $em = $this->getDoctrine()->getManager();
        $sequences = $em->getRepository('AppBundle:Breakdown')->findSequenceOfDescriptorByDescriptors($r);
        $response = new Response();
        $response->setContent(json_encode($sequences));
        return $response;
    }

    /*
 * breakdown_ajax_searchExact"
 */
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

    /*
     * breakdown_ajax_searchAll
     */
    public function searchAllByLabelAction(Request $request){
        $r = $request->get('q');

        $em = $this->getDoctrine()->getManager();
        $elements = $em->getRepository("AppBundle:Descriptor")->findByLabelAndCategoryWithSynonym( $r[0] ,$r[1]  );

        $json = array();
        $i=0;
        foreach ($elements as $element) {
            $json[] = array(
                'id' => $element["id"],
                'label' =>$element["label"],
                'color' =>$element["color"]
            );
            $i++;
        }
        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }
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
}