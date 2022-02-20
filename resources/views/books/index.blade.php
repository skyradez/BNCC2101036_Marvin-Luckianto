@extends('layouts.app')

@section('title', 'Manage Book')

@section('content')
    <div class="container">
        <div class="col-md-8 bg-light manage-wrapper">
            <h3><i class="uil uil-create-dashboard me-2"></i>Manage Book</h3>
            <p>Manage the books and don't forget to recheck it</p>
            <hr>
            <a href="{{ url('books/create') }}" class="btn btn-dark btn-sm mb-3"><i class="uil uil-plus me-2"></i>Create Book</a>

            @if(session('success_status'))
                <div class="alert alert-success" role="alert">
                    <i class="uil uil-grin-tongue-wink-alt me-2"></i>
                    {{ session('success_status') }}
                </div>
            @endif

            <table class="table table-info table-striped table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Halaman</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->judul }}</td>
                            <td>{{ $book->penulis }}</td>
                            <td>{{ $book->tahun_terbit }}</td>
                            <td>{{ $book->jumlah_halaman }}</td>
                            <td>
                                <a href="{{ url('books/' . $book->id) }}" class="text-primary"><i class="uil uil-edit"></i></a>
                                <a href="#" class="text-danger"
                                    onclick="event.preventDefault();document.getElementById
                                    ('delete-form-{{ $book->id }}').submit();">
                                    <i class="uil uil-trash-alt"></i>

                                    <form id="delete-form-{{ $book->id }}" 
                                        action="{{ url('books/' . $book->id) }}"
                                        method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection