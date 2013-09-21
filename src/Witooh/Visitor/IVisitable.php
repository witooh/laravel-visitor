<?php

namespace Witooh\Visitor;

interface IVisitable {
    /**
     * @param \Witooh\Visitor\IVisitor $visitor
     * @return void
     */
    public function accept(IVisitor $visitor);
}