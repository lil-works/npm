<?php
namespace ManagerBundle\LilClass;
use Doctrine\ORM\Id\AbstractIdGenerator;

class CurrentInterferoIdGenerator extends AbstractIdGenerator
{
    public function generate(\Doctrine\ORM\EntityManager $em, $entity){

        return $entity->getAntenna()."_".$entity->getBand();
    }

}