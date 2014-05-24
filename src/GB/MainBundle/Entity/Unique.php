<?php
namespace GB\MainBundle\Entity;

use GB\MainBundle\Model\UniqueValidator;
use Symfony\Component\Validator\Constraint;

class Unique extends Constraint
{
    public $notUniqueMessage = '%string% has already been used.';
    public $field;

    public function validatedBy()
    {
        return 'validator.unique';
    }

}