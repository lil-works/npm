<?php
// src/AppBundle/Validator/Constraints/ContainsAlphanumeric.php
namespace ManagerBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class SynonymElement extends Constraint
{
    public $message = 'The string "%string%" is yet present in the element table... It cannot be a synonym!';
}