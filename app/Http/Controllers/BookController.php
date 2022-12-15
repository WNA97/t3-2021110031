<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author_id = Author::all();
        return view('books.create', ['id' => $author_id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'required|max:13',
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:0|max:999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required|max:20',
        ]);
        Book::create($validateData);
        $request->session()->flash('success', "Successfully adding {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:255',
            'halaman' => 'required|integer|min:0|max:999',
            'kategori' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'author_id' => 'required|max:20',
        ]);
        $book->update($validateData);
        $request->session()
            ->flash('success', "Successfully updating {$validateData['judul']}!");
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index')->with(
            'success',
            "Successfully deleting {$book['title']}!"
        );
    }
}
