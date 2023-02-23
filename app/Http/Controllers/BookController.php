<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg'
        ]);

        $files = $request->file('picture');
        $fullFileName = $files->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $files->getClientOriginalExtension();
        $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
        $files->storeAs('public/pictures/', $picture);

        Book::create([
            'judul' => $request->judul,
            'sinopsis' => $request -> sinopsis,
            'penulis' => $request -> penulis,
            'picture' => $picture,
            'tahun_terbit' => $request -> tahun_terbit,
            'category_id' => $request -> category_id
        ]);

        return redirect(route('managePage'));
    }

    public function getUpdateBook($id){
        $book = Book::findOrFail($id);
        $categories = Category::all();
        
        return view('editBook',compact('book','categories'));
    }

    public function updateBook(BookRequest $request, $id){

        $book = Book::findOrFail($id);

        if ($request->file('picture') == null){

            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request -> sinopsis,
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit,
                'category_id' => $request -> category_id
            ]);

        } else{

            // File Processing
            $files = $request->file('picture');
            $fullFileName = $files->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $files->getClientOriginalExtension();
            $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
            $files->storeAs('public/pictures/', $picture);

            if (Storage::exists('public/pictures/' . $book->picture)) {
                Storage::delete('public/pictures/' . $book->picture);
            }

            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request -> sinopsis,
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit,
                'category_id' => $request -> category_id
            ]);
        }

        return redirect(route('managePage'));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        $book->delete();

        return redirect(route('managePage'));
    }
}
