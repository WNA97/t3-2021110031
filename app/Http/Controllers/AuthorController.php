<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('authors.create');
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
            'nama' => 'required|max:255',
            'kota' => 'required|integer|min:0|max:999',
            'negara' => 'required|max:255',
        ]);
        Author::create($validateData);
        $request->session()->flash('success', "Successfully adding {$validateData['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {

        $id = $author->id;
        $allBooks = Book::with('author')->where('author_id', '=', null)->orderByDesc('id')->paginate(90);
        $authorById = $author->books()->where('author_id', '=', $id)->get();
        $authorCount = $author->books()->where('author_id', '=', $id)->count();
        return view('authors.show', compact('author', 'allBooks', 'authorById', 'authorCount', 'id'));
        // return view('authors.show', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('auhtors.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $rules = [
            'id' => 'required|max:13',
            'nama' => 'required|max:255',
            'kota' => 'required|max:255',
            'negara' => 'required|max:255',
        ];
        $validated = $request->validate($rules);
        $author::where('id', [$author->id])->update($validated);

        $request->session()->flash('success', "Berhasil meremajakan data penulis - {$validated['nama']}!");
        return redirect()->route('authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();
        return redirect()->route('authors.index')->with(
            'success',
            "Successfully deleting {$author['nama']}!"
        );
    }

    public function setNull(Request $request, Book $book)
    {
        //
        $book = Book::findOrFail($request->bookId);
        $book->author_id = null;
        $book->save();
        return redirect(route('authors.show', [$request->id]));
        // return view('dashboard', compact('jumlahBuku','jumlahPenulis'));
    }
}
