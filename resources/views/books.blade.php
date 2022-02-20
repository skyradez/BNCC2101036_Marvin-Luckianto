@extends('layouts/app')

@section('title', 'Halaman Books')

@section('content')

    <div class="container mt-4">
        {{-- TITLE --}}
        <h3><i class="uil uil-book-open me-2"></i>All Books</h3>
        <hr>
        <div class="row">
            @foreach($books as $book)
            <div class="col-md-4">
                <div class="col-md-12 bg-light book-content">
                    <h1 class="judul">{{ $book->judul }}</h1>
                    <span class="penulis badge bg-info">Penulis: {{ $book->penulis }}</span>
                    <p class="tahun-terbit">Tahun Terbit: {{ $book->tahun_terbit }}</p>
                    <span class="jumlah-halaman">Jumlah Halaman: {{ $book->jumlah_halaman }} Halaman</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@endsection