<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getHomePage(){
        $books = Book::all();

        return view('home',compact('books'));

        // return view('home',[
        //     'books' => Book::all()
        // ]);
    }

    public function getContactPage(){
        return view('contactus');
    }

    public function getManagePage(){
        $books = Book::all();

        return view('manage',compact('books'));
    }
}
