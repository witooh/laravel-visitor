<?php

namespace Witooh\Visitor;

interface IVisitable {
    /**
     * @param \Balista\Visitor\IVisitor $visitor
     * @return void
     */
    public function accept(IVisitor $visitor);
}