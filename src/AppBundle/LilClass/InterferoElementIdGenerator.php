<?php
namespace ManagerBundle\LilClass;
use Doctrine\ORM\Id\AbstractIdGenerator;
class InterferoElementIdGenerator extends AbstractIdGenerator
{
    public function generate(\Doctrine\ORM\EntityManager $em, $entity){

        return $entity->getBaseline()."_".$entity->getBand();
    }

}