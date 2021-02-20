<?php

namespace Tests\VectorTest;

use App\Vector;
use PHPUnit\Framework\TestCase;

class VectorTest extends TestCase
{
    public function testAddition()
    {
        $v1 = new Vector(1, 2.5, 4);
    
        $v2 = new Vector(2, 3, -2);

        $this->assertSame("(3;5.5;2)", $v1->add($v2)->__toString());
    }

    public function testSubtraction()
    {
        $v1 = new Vector(1, 2.5, 4);
    
        $v2 = new Vector(2, 3, -2);

        $this->assertSame("(-1;-0.5;6)", $v1->sub($v2)->__toString());
    }

    public function testNumberProduct()
    {
        $v1 = new Vector(1, 2.5, 4);

        $this->assertSame("(2;5;8)", $v1->product(2)->__toString());
    }

    public function testScalarProduct()
    {
        $v1 = new Vector(1, 2.5, 4);
    
        $v2 = new Vector(2, 3, -2);

        $this->assertEquals(1.5, $v1->scalarProduct($v2));
    }

    public function testVectorProduct()
    {
        $v1 = new Vector(1, 2.5, 4);
    
        $v2 = new Vector(2, 3, -2);

        $this->assertSame("(17;-10;2)", $v1->vectorProduct($v2)->__toString());
    }
}
