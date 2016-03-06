<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchResultsTest extends TestCase
{
     public function testSearchResultsPage()
     {
         $this->visit('dvds/search')
             ->type("Ocean", 'dvd_title')
             ->press('Search')
             ->seePageIs('/dvds?dvd_title=Ocean&genre_id=all&rating_id=all');
     }
}
