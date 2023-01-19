<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Expr\New_;

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
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit
            ]);

        // dd($request->category_id);
        // $categories = array();
        // $categories.array_push($request->category_id);
        
        // $category = Category::findOrFail($request->category_id);
        // $book->category()->attach($category);
        // foreach($request->category_id as $id){
        //     $category = Category::findOrFail($id);
        //     $book->category()->attach($category);
        // }
        // $categories = Category::findOrFail($request->category_id);

        $category = Category::findOrFail([1,2]);
        $book->category()->attach($category);

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
            'penulis' => $request -> penulis,
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
