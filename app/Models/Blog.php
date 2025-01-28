<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    //
    use HasFactory;

    protected $fillable = [
        'c_name',
        'i_name',
        'description',
        'seo_title',
        'seo_keyword',
        'seo_description',
        'seo_order',
        
    ];
}
