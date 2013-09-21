<?php

namespace Witooh\Visitor;


abstract class AbstractVisitor implements IVisitor
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
            $this->defaultVisit($object);
        }
    }

    /**
     * @param object $object
     * @return mixed
     */
    abstract public function defaultVisit($object);
}