<?php
namespace ManagerBundle\LilClass;



class Interfero extends Baseline{

    public $nbrAntenna;
    public $nbrBand;
    public $baselines = array();

    public function __construct( $nbrAntenna, $nbrBand ) {
        $this->nbrAntenna = $nbrAntenna;
        $this->nbrBand = $nbrBand;
        $this->_populateInterfero();
    }

    private function _populateInterfero(){
        for($i=1;$i<=$this->nbrAntenna;$i++){
            $this->_createBaselineForAntenna($i);
        }
    }

    private function _createBaselineForAntenna($a){
        for($i=1;$i<=$this->nbrAntenna;$i++){
            if($i!=$a && !$this->_baselineExist($i,$a))
                array_push( $this->baselines,new Baseline(array($a,$i)));
        }

    }

    private function _baselineExist($ant1,$ant2){
        foreach($this->baselines as $baseline){
            if(in_array($ant1,$baseline->antennas) && in_array($ant2,$baseline->antennas) )
                return true;
        }
        return false;

    }

    public function toArray(){
        $out=array();
        for($b=1;$b<=$this->nbrBand;$b++){
            foreach($this->baselines as $baseline){
                array_push($out,
                    array(
                        "baseline"=>$baseline->antennas[0]."-".$baseline->antennas[1],
                        "band"=>$b
                    ));
            }

        }
        return $out;
    }
    public function __toString(){
        $out="";
        for($b=1;$b<=$this->nbrBand;$b++){
            $out.= "<ul>Band $b:";
            foreach($this->baselines as $baseline){
                $out.= "<li>Baseline: ".$baseline->antennas[0]." - ".$baseline->antennas[1]."  Band: ".$b."</li> ";
            }
            $out.= "</ul>";
        }
        return $out;
    }


}
