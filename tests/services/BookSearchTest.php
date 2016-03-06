<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class BookSearch extends TestCase
{
    public function setUp()
    {
        $jsonString = '[
            { "title": "Introduction to HTML and CSS", "pages": 432 },
            { "title": "Learning JavaScript Design Patterns", "pages": 32 },
            { "title": "Object Oriented JavaScript", "pages": 42 },
            { "title": "JavaScript Web Applications", "pages": 99 },
            { "title": "PHP Object Oriented Solutions", "pages": 80 },
            { "title": "PHP Design Patterns", "pages": 300 },
            { "title": "Head First Java", "pages": 200 }
        ]';

        $this->books = json_decode($jsonString);
    }

    public function testFindExistingBooks()
    {
        $this->setUp();
        $search = new \App\Services\BookSearch($this->books);
        $results = $search->find('javascript');

        $this->assertContains('Learning JavaScript Design Patterns', $results, '', true);
        $this->assertContains('Object Oriented JavaScript', $results, '', true);
        $this->assertContains('JavaScript Web Applications', $results, '', true);
    }

    public function testExactMatchBook()
    {
        $this->setUp();
        $search = new \App\Services\BookSearch($this->books);
        $results = $search->find('javascript web applications', true);

        $this->assertContains('JavaScript Web Applications', $results, '', true);
    }

    public function testBadBook()
    {
        $this->setUp();
        $search = new \App\Services\BookSearch($this->books);
        $results = $search->find('The Definitive Guide to Symfony', true);

        $this->assertNotContains('The Definitive Guide to Symfony', $results, '', true);
    }
}
