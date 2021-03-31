<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\BooksList;
use App\Book;

class BooksListTest extends TestCase
{
    public function testAddAndCount()
    {
        $book = new Book();
        $booksList = new BooksList();
        $booksList->add($book);
        $this->assertSame(1, $booksList->count());
    }

    public function testGet()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Think and Grow Rich")->setAuthors(array("Napoleon Hill"))
            ->setPublisher("Prime-Euro Sign")->setYear(2020);
        $booksList->add($book);
        $this -> assertInstanceOf(Book::class, $booksList -> get(1));
    }

    public function testStore()
    {
        $book = new Book();
        $booksList = new BooksList();
        $book->setName("Think and Grow Rich")->setAuthors(array("Napoleon Hill"))
            ->setPublisher("Prime-Euro Sign")->setYear(2020);
        $booksList->add($book);
        $this -> assertSame(null, $booksList -> store("output"));
    }

    public function testLoad()
    {
        $booksList = new BooksList();
        $booksList->load("output");
        $this->assertSame(1, $booksList->count());
        $this->assertInstanceOf(Book::class, $booksList->get(1));
    }

    public function testCurrentAndKey()
    {
        $book1 = new Book();
        $book2 = new Book();
        $book3 = new Book();
        $booksList = new BooksList();
        $book1 -> setName("Think and Grow Rich")->setAuthors(array("Napoleon Hill"))
            ->setPublisher("Prime-Euro Sign")->setYear(2020);
        $book2 -> setName("Great Deals")->setAuthors(array("Jane Alister"))
            ->setPublisher("Mark Company")->setYear(2018);
        $book3 -> setName("Forever Happy")
            ->setAuthors(array("J. Still", "J. Grown", "L. Mande"))
            ->setPublisher("Big Study")->setYear(2002);
        $booksList -> add($book1);
        $booksList -> add($book2);
        $booksList -> add($book3);

        $this->assertSame(
            "Id: 4" . "\n" .
            "Название: Think and Grow Rich" . "\n" .
            "Автор 1: Napoleon Hill" . "\n" .
            "Автор 2: Napoleon Hill" . "\n" .
            "Издательство: Prime-Euro Sign" . "\n" .
            "Год: 2020",
            $booksList -> current() -> __toString()
        );
        $this -> assertSame(4, $booksList -> key());
        return $booksList;
    }

    public function testNext(BooksList $booksList)
    {
        $booksList->next();
        $this->assertSame(
            "Id: 5" . "\n" .
            "Название: Great Deals" . "\n" .
            "Автор 1: Jane Alister" . "\n" .
            "Издательство: Mark Company" . "\n" .
            "Год: 2018",
            $booksList -> current() -> __toString()
        );
        $booksList->next();
        $this->assertSame(
            "Id: 6" . "\n" .
            "Название: Forever Happy" . "\n" .
            "Автор 1: J. Still" . "\n" .
            "Автор 2: J. Grown" . "\n" .
            "Автор 3: L. Mande" . "\n" .
            "Издательство: Big Study" . "\n" .
            "Год: 2002",
            $booksList -> current() -> __toString()
        );

        return $booksList;
    }

    public function testValidAndRewind(BooksList $booksList)
    {
        $booksList -> next();
        $this -> assertSame(false, $booksList -> valid());
        $booksList -> rewind();
        $this -> assertSame(true, $booksList -> valid());
        $this -> assertSame(
            "Id: 4" . "\n" .
            "Название: Think and Grow Rich" . "\n" .
            "Автор 1: Napoleon Hill" . "\n" .
            "Автор 2: Napoleon Hill" . "\n" .
            "Издательство: Prime-Euro Sign" . "\n" .
            "Год: 2020",
            $booksList->current()->__toString()
        );
    }
}
