<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Display the user management page
    public function blogCategory()
    {
        return view('admin.blog.blogCategory');
    }

    // Display the permissions management page
    public function blogCrud()
    {
        return view('admin.blog.blogCrud');
    }
}

    
