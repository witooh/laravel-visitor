<?php
namespace Witooh\Visitor\Test;

use Mockery as m;
use Witooh\Visitor\AbstractVisitor;

class AbstractVisitorTest extends \PHPUnit_Framework_TestCase {


    public function tearDown()
    {
        m::close();
    }

    public function testNewInstance()
    {
        //Act
        $visitor = m::mock('Witooh\Visitor\AbstractVisitor[defaultVisit]');
        $visitor->shouldReceive('defaultVisit');

        //Assert
        $this->assertInstanceOf('Witooh\Visitor\AbstractVisitor', $visitor);
    }

    public function testVisit()
    {
        //Arrange
        $visitor = m::mock('Witooh\Visitor\AbstractVisitor[defaultVisit]');
        $visitor->shouldReceive('defaultVisit')->once();
        $dump = m::mock('Witooh\Visitor\IVisitable');
        $dump->shouldReceive('accept')->with(m::type('Witooh\Visitor\IVisitor'))->andReturnUsing(function($visitor){
           $visitor->visit(m::self());
        })->once();

        //Act
        $dump->accept($visitor);
    }
}
