<?php

namespace Tests\App\Http\Controllers;

use TestCase;

class BooksControllerTest extends TestCase
{
    /** @test */
    public function index_status_code_should_be_200(): void
    {
        $this->get('/books')->seeStatusCode(200);
    }

    /** @test */
    public function index_should_return_a_collection_or_records()
    {
        $this->get('/books')
            ->seeJson([
                'title' => 'foo',
            ])
            ->seeJson([
                'title' => 'bar',
            ]);
    }
}
