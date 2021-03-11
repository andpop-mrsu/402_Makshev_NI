<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Stack;

class StackTest extends TestCase
{
    public function testPushAndEmpty()
    {
        $stack = new Stack();
        $this -> assertSame(true, $stack -> isEmpty());
        $stack -> push(1332, "qwerty");
        $this -> assertSame(false, $stack -> isEmpty());
    }

    public function testTop()
    {
        $stack = new Stack("007", 212, 987, "tests", 402);
        $this -> assertSame(402, $stack -> top());
    }

    public function testPop()
    {
        $stack1 = new Stack(7, 7, 7, 3, "qwerty", "tests");
        $stack2 = new Stack();
        $this -> assertSame("tests", $stack1 -> pop());
        $this -> assertSame("qwerty", $stack1 -> top());
        $this -> assertSame(null, $stack2 -> pop());
    }

    public function testTextRepresentation()
    {
        $stack = new Stack(1, 0, "e", "d", "c", "b", "a");
        $this -> assertSame("[a->b->c->d->e->0->1]", $stack -> __toString());
    }

    public function testCopy()
    {
        $stack = new Stack(3, 2, 1, 321, "tests402", 777);
        $newStack = $stack -> copy();
        $this -> assertInstanceOf(Stack::class, $newStack);
        $this -> assertSame(false, $newStack -> isEmpty());
        $this -> assertSame(777, $newStack -> top());
    }
}
