<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BookAPIController extends Controller
{
    public function getAllBooks(){
        $books = Book::all();

        return response()->json([
            'books' => $books
        ]);
    }

    public function viewBook($id){
        $book = Book::findOrFail($id);

        return response()->json([
            'book' => $book
        ]);
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
            'category_id' => $request -> category_id
        ]);

        return response()->json([
            'message' => 'data buku berhasil ditambahkan'
        ]);
    }

    public function updateBook(BookRequest $request, $id){
        $book = Book::findOrFail($id);

            // $request->validate([
            //     'picture' => 'required|mimes:png,jpg,jpeg,jfif'
            // ]);
    
            // //file processing
            // $file = $request->picture;
            // $fullFileName = $file->getClientOriginalName();
            // $fileName = pathinfo($fullFileName)['filename'];
            // $extension = $file->getClientOriginalExtension();
            // $picture = $fileName . '-' . Str::random(10) . '-' . date('dmYhis') . '.' . $extension;
            // $file->storeAs('public/pictures/', $picture);

            // if(Storage::exists('public/pictures/' . $book->picture)){
            //     Storage::delete('public/pictures/' . $book->picture);
            // }

            $book->update([
                'judul' => $request->judul,
                'sinopsis' => $request -> sinopsis,
                'penulis' => $request -> penulis,
                'tahun_terbit' => $request -> tahun_terbit,
                'picture' => $request ->picture,
                'category_id' => $request -> category_id
            ]);
        
            return response()->json([
                'message' => 'data buku berhasil diubah'
            ]);
    }

    public function deleteBook($id){
        $book = Book::findOrFail($id);

        if(Storage::exists('public/pictures/' . $book->picture)){
            Storage::delete('public/pictures/' . $book->picture);
        }

        $book->delete();

        return response()->json([
            'message' => 'data buku berhasil dihapus'
        ]);
    }
}
