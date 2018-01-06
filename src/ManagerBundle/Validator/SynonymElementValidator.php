<?php
namespace ManagerBundle\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SynonymElementValidator extends ConstraintValidator
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function validate($value, Constraint $constraint)
    {
        $element = $this->entityManager->getRepository('ManagerBundle:PMElement')->findOneByLabel();
        die(var_dump($element->getId()));
    }
}