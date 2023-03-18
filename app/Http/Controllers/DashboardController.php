<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if(Auth::user()->role == 'Admin'){
            $books = Book::all();
        } else {
            $books = Book::where('user_id',Auth::user()->id)->get();
        }
        
        return view('manage',compact('books'));
    }

    public function getManageCategories(){

        $categories = Category::all();
        
        return view('manage-tags',compact('categories'));
    }

    public function deleteCategory($id){
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect(route('manageCategories'));
    }
}
