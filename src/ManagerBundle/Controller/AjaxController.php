<?php
namespace ManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AjaxController extends Controller
{
    /*
    public function searchOneByLabelRoute(Request $request,$repository){
        $em = $this->getDoctrine()->getManager();
        $element = $em->getRepository("ManagerBundle:$repository")->findOneByLabelWithSynonym( $request->get('q') );
        $json = array();
        if($element){
            $json['id'] = $element['id'];
            $json['label'] = $element['label'];
        }
        $response = new Response();
        $response->setContent(json_encode($json));
        return $response;
    }

    public function searchAllByLabelRoute(Request $request,$repository){
        $em = $this->getDoctrine()->getManager();
        $elements = $em->getRepository("ManagerBundle:$repository")->findAllByLabelWithSynonym( $request->get('q') );
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

    public function searchOneByLabelRoute_elementAction(Request $request){
        return $this->searchOneByLabelRoute($request,"NPMElement");
    }
    public function searchOneByLabelRoute_stateAction(Request $request){
        return $this->searchOneByLabelRoute($request,"NPMState");
    }
    public function searchOneByLabelRoute_actionAction(Request $request){
        return $this->searchOneByLabelRoute($request,"NPMAction");
    }
    public function searchOneByLabelRoute_contributorAction(Request $request){
        return $this->searchOneByLabelRoute($request,"NPMContributor");
    }

    public function searchAllByLabelRoute_elementAction(Request $request){
        return $this->searchAllByLabelRoute($request,"NPMElement");
    }
    public function searchAllByLabelRoute_stateAction(Request $request){
        return $this->searchAllByLabelRoute($request,"NPMState");
    }
    public function searchAllByLabelRoute_actionAction(Request $request){
        return $this->searchAllByLabelRoute($request,"NPMAction");
    }
    public function searchAllByLabelRoute_contributorAction(Request $request){
        return $this->searchAllByLabelRoute($request,"NPMContributor");
    }
*/
}