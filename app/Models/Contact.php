<?php

namespace App\Models;

use App\Mail\SendMail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subject',
        'message'
    ];

    public static function boot() {

        parent::boot();

        static::created(function ($item) {
                
            $adminEmail = "ryan22febrian@gmail.com";
            Mail::to($adminEmail)->send(new SendMail($item));
        });
    }
}
