@extends('layouts.master')
@section('title','Author List')
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
                    <h2>Daftar Penulis</h2>
                </div>
                <div class="col-sm-6">
                    <a href="{{ route('authors.create') }}" class="btn btn-success">
                        <i class="fa fa-plus fa-fw" aria-hidden="true"></i>
                        <span>Tambah Penulis</span>
                    </a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kota</th>
                    <th>Negara</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($authors as $author)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><a href="{{ route('authors.show', $author->id) }}">
                            {{ $author->nama }}
                        </a></td>
                    <td>{{ $author->kota }}</td>
                    <td>{{ $author->negara }}</td>
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
