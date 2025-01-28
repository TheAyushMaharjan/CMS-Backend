<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function gallerySetup()
    {
        return view('admin.media.gallerySetup');
    }

    // Display the permissions management page
    public function preview()
    {
        return view('admin.media.preview');
    }
}
