<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {
        $authors = Author::all();
        $selectId = 0;
        if ($request->author_id) {
            $books = Book::where('author_id', $request->author_id)->orderBy('title')->get();
            $selectId = $request->author_id;
        } else {
            $books = Book::orderBy('title')->get();
        }
        return view('book.index', compact('books', 'authors', 'selectId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        return view('book.create', ['authors' => $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),
            [
                'book_title' => ['required', 'min:3', 'max:64'],
                'book_isbn' => ['required'],
                'book_pages' => ['required'],
                'book_short_description' => ['required', 'min:3', 'max:64'],


            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $book = new Book;
        $book->title = $request->book_title;
        $book->pages = $request->book_pages;
        $book->isbn = $request->book_isbn;
        $book->short_description = $request->book_short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sucessfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));

    }
    public function createPDF(Book $book){

        $data = Book::all();
        $pdf = PDF::loadView('book.pdf', compact('book', 'data'));
        return $pdf->stream('book.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $authors = Author::all();
        return view('book.edit', ['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validator = Validator::make($request->all(),
            [
                'book_title' => ['required', 'min:3', 'max:64'],
                'book_isbn' => ['required', 'min:3', 'max:64'],
                'book_pages' => ['required'],
                'book_short_description' => ['required', 'min:3', 'max:64'],


            ]
        );
        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $book->title = $request->book_title;
        $book->isbn = $request->book_isbn;
        $book->pages = $request->book_pages;
        $book->short_description = $request->book_short_description;
        $book->author_id = $request->author_id;
        $book->save();
        return redirect()->route('book.index')->with('success_message', 'Sėkmingai pakeistas.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('book.index')->with('success_message', 'Sekmingai ištrintas.');
    }
}
