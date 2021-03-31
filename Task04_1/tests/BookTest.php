<?php

namespace Tests\BookTest;

use App\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSetName()
    {
        $book = new Book();
        $book->setName("Think and Grow Rich");

        $this->assertEquals("Think and Grow Rich", $book->getName());
    }

    public function testSetAuthors()
    {
        $book = new Book();
        $book->setAuthors(array("Napoleon Hill"));

        $this->assertEquals(array("Napoleon Hill"), $book->getAuthors());
    }

    public function testSetPublisher()
    {
        $book = new Book();
        $book->setPublisher("Prime-Euro Sign");

        $this->assertEquals("Prime-Euro Sign", $book->getPublisher());
    }

    public function testSetYear()
    {
        $book = new Book();
        $book->setYear(2020);

        $this->assertEquals(2020, $book->getYear());
    }
}
