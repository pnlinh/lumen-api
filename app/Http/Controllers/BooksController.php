<?php

namespace App\Http\Controllers;

use App\Book;

class BooksController extends Controller
{
    /**
     * GET /books
     *
     * @return array
     * @author pnlinh <pnlinh1207@gmail.com>
     */
    public function index()
    {
        return Book::all();
    }
}
