<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }    

    public function showAllBook()
    {
        $books = Book::all();
        return view('books/index', compact('books'));
    }

    public function create()
    {
        return view('books/create');
    }

    public function store(Request $request)
    {
        //VALIDASI
        $request->validate([
            'judul' => 'required|string|min:5|max:20',
            'penulis' => 'required|string|min:5|max:20',
            'jumlah_halaman' => 'required|integer|min:0',
            'tahun_terbit' => 'required|integer|min:2000|max:2021',
        ]);


        // NAMBAH BUKU KE DATABASE
        Book::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah_halaman' => $request->jumlah_halaman,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect('/books/manage')->with('success_status', 'Buku Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books/edit', compact(['book']));
    }

    public function update(Request $request, $id)
    {
        //VALIDASI
        $request->validate([
            'judul' => 'required|string|min:5|max:20',
            'penulis' => 'required|string|min:5|max:20',
            'jumlah_halaman' => 'required|integer|min:0',
            'tahun_terbit' => 'required|integer|min:2000|max:2021',
        ]);

        //UPDATE KE TABLE BOOK
        $book = Book::findOrFail($id);
        $book->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'jumlah_halaman' => $request->jumlah_halaman,
            'tahun_terbit' => $request->tahun_terbit,
        ]);

        return redirect('/books/manage')->with('success_status', 'Buku Berhasil Ditambahkan');
    }

    public function destroy($id) 
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books/manage')->with('success_status', 'Buku Berhasil Dihapus');
    }

}
