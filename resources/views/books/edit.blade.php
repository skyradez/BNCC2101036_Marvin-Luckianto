@extends('layouts/app')

@section('title', 'Edit Book')

@section('content')
    <div class="container">
        <div class="col-md-7 bg-light manage-wrapper">
            <h3><i class="uil uil-edit me-2"></i>Edit Book</h3>
            <p>Manage the books and don't forget to recheck it</p>
            <hr>
            <form action="{{ url('books/' . $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Judul Buku</label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                        placeholder="Masukkan Judul Buku" name="judul" value={{ $book->judul }}>
                    @error('judul')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Penulis Buku</label>
                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                        placeholder="Masukkan Penulis Buku" name="penulis" value={{ $book->penulis }}>
                    @error('penulis')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Jumlah Halaman</label>
                    <input type="number" class="form-control @error('jumlah_halaman') is-invalid @enderror" 
                        placeholder="Masukkan Jumlah Halaman Buku" name="jumlah_halaman" value={{ $book->jumlah_halaman }}>
                    @error('jumlah_halaman')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Terbit</label>
                    <input type="number" class="form-control @error('tahun_terbit') is-invalid @enderror" 
                        placeholder="Masukkan Tahun Terbit Buku" name="tahun_terbit" value={{ $book->tahun_terbit }}>
                    @error('tahun_terbit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror    
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection