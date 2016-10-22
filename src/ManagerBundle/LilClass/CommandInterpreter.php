<?php
/**
 * Created by PhpStorm.
 * User: lil-works
 * Date: 28/03/16
 * Time: 00:13
 */

namespace ManagerBundle\LilClass;


class CommandInterpreter {

    public $elements = array();
    public $contributors = array();
    public $status = null ;
    public $action = null ;

    public function __construct($str){
        /*
         * antenna 1>I2C|stuck<reboot
         */
        $this->str = $str ;

        if(strstr($this->str,'|')){
            $this->haveStatusAction = true;
        }
        if(strstr($this->str,'>')){
            $this->haveObjects = true;
        }
        if(strstr($this->str,'<')){
            $this->haveAction = true;
        }

        $this->getElements();
        $this->getStatusAction();
        $this->getContributors();

    }
    public function getContributors(){
        if(strstr($this->str,'#')){
            $tmp = explode('#',$this->str);
            if(strstr($tmp[1],',')){
                foreach(explode(',',$tmp[1]) as $contributor){
                    array_push($this->contributors,$contributor);
                }
            }else{
                array_push($this->contributors,$tmp[1]);
            }
        }


    }
    public function getElements(){
        if($this->haveStatusAction){
            $tmp = explode('|',$this->str);
        }else{
            $tmp = $this->str;
        }
        foreach( explode('>',$tmp[0]) as $element ){
            array_push($this->elements,$element);
        }
    }
    public function getStatusAction(){
        if($this->haveStatusAction){
            $tmp = explode('|',$this->str);
            if($this->haveAction){
                $tmp2 = explode('<',$tmp[1]);
                $this->status = $tmp2[0];
                $this->action = $tmp2[1];
            }else{
                $this->action = $tmp[1];
                $this->status = null;
            }
            if(strstr($this->action,"#")){
                $tmp2 = explode("#",$this->action);
                $this->action = $tmp2[0];
            }
        }else{
            $this->action = null ;
        }
    }

} 