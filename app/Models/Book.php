<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'sinopsis',
        'penerbit',
        'tahun_terbit',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function authors(){
        return $this->belongsToMany(Author::class,'author_book','book_id','author_id')
                    ->withPivot('status')
                    ->wherePivotIn('status',[1,2])
                    ->withTimestamps()
                    ->using(AuthorStatus::class)
                    ->as('status');
    }
}
