<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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

    /**
     * GET /books/{id}
     *
     * @param $id
     * @return mixed
     * @author pnlinh <pnlinh1207@gmail.com>
     */
    public function show($id)
    {
        try {
            return Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found',
                ],
            ], 404);
        }
    }

    /**
     * POST /books
     *
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     * @author pnlinh <pnlinh1207@gmail.com>
     */
    public function store(Request $request)
    {
        $book = Book::create($request->all());

        return response()->json(['created' => true], 201, [
            'Location' => route('books.show', ['id' => $book->id]),
        ]);
    }

    /**
     * PUT /books/{id}
     *
     * @param \Illuminate\Http\Request $request
     * @param $id
     * @return \App\Book
     * @author pnlinh <pnlinh1207@gmail.com>
     */
    public function update(Request $request, $id)
    {
        try {
            $book = Book::findOrFail($id);
        } catch (ModelNotFoundException $exception) {
            return response()->json([
                'error' => [
                    'message' => 'Book not found',
                ]
            ], 404);
        }

        $book->fill($request->all());
        $book->save();

        return $book;
    }
}
