@extends('layouts.master')
@section('title','Book List')
@push('css_after')
<style>
    td {
        max-width: 0;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
    }
</style>
@endpush
@section('content')
@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session()->get('success') }}
</div>
@endif
<div class="table-responsive">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Daftar Buku</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('books.create') }}" class="btn btn-success">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Tambah Buku</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Halaman</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($books as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('books.show', $book->id) }}">
                            {{ $book->judul }}
                        </a></td>
                    <!-- <td>{{ $book->judul }}</td> -->
                    <td>{{ $book->halaman }}</td>
                    <td>{{ $book->kategori }}</td>
                    <td>{{ $book->penerbit }}</td>
                </tr>
                @empty
                <tr>
                    <td align="center" colspan="6">No data yet.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
