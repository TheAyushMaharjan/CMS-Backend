<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{

    public function store(request $request){
        try{
            
            $validateData = $request->validate([
                'category_name'=>'required|string|min:3',
                'icon_name'=>'required|string|min:3',
                'description'=>'nullable|string|min:3',
                'is_published' => 'nullable|in:0,1',

            ]);
            Log::info('Validation Data:', $validateData); // Check if validation is passing

            Blog::create([
                'category_name'=>$validateData['category_name'],
                'icon_name'=>$validateData['icon_name'],
                'description'=>$validateData['description'] ?? null,
                'is_published' => $request->input('is_published',0),
            ]);
            return redirect()->route('admin.blog.blogSetup')->with('success','Blog added Successfully!');
        }
        catch(\Exception $e){
            Log::error('Error creating user: ', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.blog.blogSetup')->with('error', 'An error occurred while creating the blog. Please try again.');
       
        }
    }
    public function destroy(string $id){
        $data = Blog::where('id',$id)->delete();
        return redirect()->route('admin.user.blogSetup')->with('success', 'Data deleted successfully.');
    }

    // Display the user management page
    public function blogCategory()
    {
        return view('admin.blog.blogCategory');
    }

    // Display the permissions management page
    public function blogSetup()
    {
        $blogs = Blog::paginate(10); // Adjust the number as per your requirement
        return view('admin.blog.blogSetup',compact('blogs'));
    }
}

    
