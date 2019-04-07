<?php

namespace App\Http\Controllers;

class BooksController extends Controller
{
    /**
     * GET /books
     *
     * @return array
     * @author pnlinh <pnlinh1207@gmail.com>
     */
    public function index(): array
    {
        return [
            ['title' => 'foo'],
            ['title' => 'bar'],
        ];
    }
}
