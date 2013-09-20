<?php

namespace Witooh\Visitor;


class AbstractVisitor implements IVisitor
{
    /**
     * @param object $object
     * @return void
     */
    public function visit($object)
    {
        $objectRefection  = new \ReflectionObject($object);
        $visitorRefection = new \ReflectionObject($this);

        $visitMethod = "visitor" . $objectRefection->getName();

        if ($visitorRefection->hasMethod($visitMethod)) {
            $this->$visitMethod($object);
        } else {
            $this->visit($object);
        }
    }
}