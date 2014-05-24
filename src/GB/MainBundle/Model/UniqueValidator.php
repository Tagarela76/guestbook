<?php

namespace GB\MainBundle\Model;

use Silex\Application;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class UniqueValidator extends ConstraintValidator
{
    private $em;

    public function validate($value, Constraint $constraint)
    {
        $messageManager = new MessageManager($this->em);

        $exists = $messageManager->findOneByField($constraint->field, $value);

        if ($exists) {
            $this->context->addViolation($constraint->notUniqueMessage, array('%string%' => $value));
            return false;
        }

        return true;
    }

    public function setEm(Application $app)
    {
        $this->em = $app['db.orm.em'];
    }
}