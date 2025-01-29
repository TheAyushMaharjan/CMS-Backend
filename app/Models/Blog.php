<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'category_name',
        'icon_name',
        'description',
        'is_published', 
        
    ];
}
