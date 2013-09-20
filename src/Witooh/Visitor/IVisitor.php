<?php

namespace Witooh\Visitor;


interface IVisitor {

    /**
     * @param object $object
     * @return mixed
     */
    public function visit($object);
}