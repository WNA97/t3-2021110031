@extends('layouts.master')
@section('title', 'Formulir Penambahan Data Penulis')
@section('content')
<h2>Add New Author</h2>
<form action="{{ route('authors.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="nama">Nama Penulis</label>
            <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama') }}">
            @error('nama')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label for="kota">Kota</label>
            <input type="text" class="form-control @error('kota') is-invalid @enderror" name="kota" id="kota" value="{{ old('kota') }}">
            @error('kota')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label for="negara">negara</label>
            <input type="text" class="form-control @error('negara') is-invalid @enderror" name="negara" id="negara" value="{{ old('negara') }}">
            @error('negara')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <button class="btn btn-primary btn-lg btn-block" type="submit">Add</button>
</form>
@endsection
