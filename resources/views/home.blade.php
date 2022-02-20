@extends('layouts/app')

@section('title', 'Halaman Home')

@section('content')
    {{-- BANNER --}}
    <div class="container banner">
        <h1>Selamat Datang di Perpustakaan Musang</h1>
        <p>Kumpulan informasi buku hasil karya anak bangsa dan terupdate setiap harinya</p>
        
        <a href="{{ url('/books/manage') }}" class="btn btn-warning">Manage Books</a>
        <a href="{{ url('/contact') }}" class="btn btn-light">Contact Us</a>
    </div>


    {{-- BOOK CONTENT --}}
    <div class="container mt-4">
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
