<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class splashscreen extends Model
{
    use HasFactory;

    protected $fillable =[
        "Title",
        "Subtitle" ,
        "image_url"
    ];
}
