<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function getCreateBook(){
        $categories = Category::all();

        return view('createBook',compact('categories'));
    }

    public function createBook(BookRequest $request){
        
        $request->validate([
            'picture' => 'required|mimes:png,jpg,jpeg,jfif'
        ]);

        //file processing
        $file = $request->picture;
        $fullFileName = $file->getClientOriginalName();
        $fileName = pathinfo($fullFileName)['filename'];
        $extension = $file->getClientOriginalExtension();
        $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
        $file->storeAs('public/pictures/', $picture);

        Book::create([
            'judul' => $request->judul,
            'sinopsis' => $request -> sinopsis,
            'penulis' => $request -> penulis,
            'tahun_terbit' => $request -> tahun_terbit,
            'picture' => $picture,
            'category_id' => $request -> category_id,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('managePage'));
    }

    public function getUpdateBook($id){
        $book = Book::findOrFail($id);

        if(Auth::user()->id != $book->user_id && Auth::user()->role == 'User'){
            return redirect(route('managePage'));
        }

        $categories = Category::all();
        
        return view('editBook',compact('book','categories'));
    }

    public function updateBook(BookRequest $request, $id){
        $book = Book::findOrFail($id);

        if(Auth::user()->id != $book->user_id  && Auth::user()->role == 'User'){
            return redirect(route('managePage'));
        }

        if ($request->picture == null){
            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request -> sinopsis,
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit,
                'category_id' => $request -> category_id
            ]);
        } else {
            $request->validate([
                'picture' => 'required|mimes:png,jpg,jpeg,jfif'
            ]);
    
            //file processing
            $file = $request->picture;
            $fullFileName = $file->getClientOriginalName();
            $fileName = pathinfo($fullFileName)['filename'];
            $extension = $file->getClientOriginalExtension();
            $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
            $file->storeAs('public/pictures/', $picture);

            if(Storage::exists('public/pictures/' . $book->picture)){
                Storage::delete('public/pictures/' . $book->picture);
            }

            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request -> sinopsis,
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit,
                'picture' => $picture,
                'category_id' => $request -> category_id
            ]);
        }

        return redirect(route('managePage'));
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        if(Auth::user()->id != $book->user_id  && Auth::user()->role == 'User'){
            return redirect(route('managePage'));
        }

        if(Storage::exists('public/pictures/' . $book->picture)){
            Storage::delete('public/pictures/' . $book->picture);
        }

        $book->delete();

        return redirect(route('managePage'));
    }
}
