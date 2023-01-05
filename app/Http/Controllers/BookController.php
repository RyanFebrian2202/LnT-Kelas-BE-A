<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
    public function getCreateBook(){
        return view('createBook');
    }

    public function createBook(BookRequest $request){
        // $request->validate([
        //     'judul' => 'required|string|min:8',

        // ]);

        $judul = $request->judul;

        Book::create([
            'judul' => $judul,
            'sinopsis' => $request -> sinopsis,
            'penulis' => $request -> penulis,
            'tahun_terbit' => $request -> tahun_terbit
        ]);

        return redirect(route('managePage'));
    }

    public function getUpdateBook($id){
        $book = Book::findOrFail($id);
        
        return view('editBook',compact('book'));
    }

    public function updateBook(BookRequest $request, $id){
        $book = Book::findOrFail($id);

        $book->update([
            'judul' => $request->judul,
            'sinopsis' => $request -> sinopsis,
            'penulis' => $request -> penulis,
            'tahun_terbit' => $request -> tahun_terbit
        ]);

        return redirect(route('managePage'));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect(route('managePage'));
    }
}
