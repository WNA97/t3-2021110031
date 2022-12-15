@extends('layouts.master')
@section('title', $author->title)
@section('content')
<main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <a href="{{ route('authors.index') }}" class="btn btn-sm btn-success">Kembali</a>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-sm btn-primary">Ubah</a>
                <form action="{{ route('authors.destroy', $author->id) }}" method="POST">
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    @method('DELETE') @csrf
                </form>
            </div>
        </div>
    </div>
    <h2>
        Nama penulis : {{ $author->nama }}
    </h2>
    <p>
    <ul class="list-inline">
        <li class="list-inline-item">
            <i class="fa fa-th-large fa-fw"></i>
            <em>Asal Negara : {{ $author->negara }}</em>
        </li>|
        <li class="list-inline-item">
            <i class="fa fa-calendar fa-fw"></i>
            Jumlah buku : {{ $authorCount }}
        </li>
    </ul>
    </p>
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
                        <a href="{{ route('books.create')}}" class="btn btn-success">
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
                        <th>id</th>
                        <th>Judul</th>
                        <th>Halaman</th>
                        <th>Kategori</th>
                        <th>Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($authorById as $author)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $author->id }}</td>
                        <td style="width: 25%">{{ $author->judul }}</td>
                        <td>{{ $author->halaman }}</td>
                        <td>{{ $author->kategori }}</td>
                        <td>{{ $author->penerbit }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td align="center" colspan="6">No data yet. {{-- Add new book <a href="{{ route('books.create') }}">click nengkene</a> --}} </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>

{{-- === modal ============ --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            </div>
            <div class="modal-body">
                {{-- <div class="table-responsive"> --}}
                <div class="table-wrapper">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Penerbit</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($allBooks as $allBook)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td style="width: 30%">{{ $allBook->judul }}</td>
                                <td>{{ $allBook->kategori }}</td>
                                <td>{{ $allBook->penerbit }}</td>
                                <td>
                                    <form action="{{ route('setAuthorId', ['author'=>$id]) }}" method="POST">
                                        @method('GET')
                                        @csrf
                                        <input type="text" name="id" id="id" value="{{ $id }}" hidden>
                                        <input type="text" name="bookId" id="bookId" value="{{ $allBook->id }}" hidden>
                                        <button class="btn btn-sm btn-primary btn-lg btn-block" type="submit">tambah</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td align="center" colspan="6">No data yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- </div> --}}
            </div>
            {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div> --}}
        </div>
    </div>
</div>
@endsection
