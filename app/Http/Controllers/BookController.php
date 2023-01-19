<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class BookController extends Controller
{
    public function getCreateBook(){
        $categories = Category::all();

        return view('createBook',compact('categories'));
    }

    public function createBook(BookRequest $request){
        // $request->validate([
        //     'judul' => 'required|string|min:8',

        // ]);

        $judul = $request->judul;

        $book = 
            Book::create([
                'judul' => $judul,
                'sinopsis' => $request -> sinopsis,
                'penerbit' => $request -> penerbit,
                'tahun_terbit' => $request -> tahun_terbit,
                'category_id' => $request -> category_id
            ]);

        $authors = Author::findOrFail([1,2,3]);
        $book->authors()->attach($authors);
        $authorDelete = Author::findOrFail(3);
        $book->authors()->detach($authorDelete);

        return redirect(route('managePage'));
    }

    public function getUpdateBook($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        
        return view('editBook',compact('book','categories'));
    }

    public function updateBook(BookRequest $request, $id){
        $book = Book::findOrFail($id);

        $book->update([
            'judul' => $request->judul,
            'sinopsis' => $request -> sinopsis,
            'penerbit' => $request -> penerbit,
            'tahun_terbit' => $request -> tahun_terbit,
            'category_id' => $request -> category_id
        ]);

        return redirect(route('managePage'));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect(route('managePage'));
    }
}
