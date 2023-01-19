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
        'penulis',
        'tahun_terbit',
    ];

    public function category(){
        return $this->belongsToMany(Category::class,'category_book','book_id','category_id')->withPivot('code');
    }

    public function codes(){
        return $this->belongsToMany(Category::class,'category_book','book_id','category_id')
            ->withPivot('code')
            ->wherePivot('code','A1');
    }
}
