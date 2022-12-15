@extends('layouts.master')
@section('title', $book->title)
@section('content')
<div class="col-md-12">
    <h2>{{ $book->judul }}</h2>
    <h5>
        <span class="badge badge-primary">
            <i class="fa-solid fa-passport"></i>
            {{ $book->id }}
        </span>
    </h5>
    <div class="col-md-4">
        <div class="float-right">
            <div class="btn-group" role="group">
                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-primary ml-3">Edit</a>
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    <button type="submit" class="btn btn-danger ml-3">Delete</button>
                    @method('DELETE')
                    @csrf
                </form>
            </div>
        </div>
    </div>

    <p>
    <ul class="list-inline">
        <li class="list-inline-item">
            <i class="fa-solid fa-file"></i>
            <em>{{ $book->halaman }}</em>
        </li>
        <li class="list-inline-item">
            <i class="fa-solid fa-folder-closed"></i>
            {{ $book->kategori }}
        </li>
        <li class="list-inline-item">
            <i class="fa-solid fa-building"></i>
            {{ $book->penerbit }}
        </li>
    </ul>
    </p>
</div>
@endsection
