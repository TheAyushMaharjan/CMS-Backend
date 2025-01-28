<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\manageUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required|string|max:255',
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'contact' => 'required|string|max:15',
                'address' => 'required|string|max:255',
            ]);
    
    
            // Create a new user
            User::create([
                'username' => $validatedData['username'],
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => $validatedData['password'],
                'contact' => $validatedData['contact'],
                'address' => $validatedData['address'],
            ]);
    
            return redirect()->route('admin.user.manageUser')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            Log::error('Error creating user: ', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
            return redirect()->route('admin.user.manageUser')->with('error', 'An error occurred while creating the user. Please try again.');
        }
    }
    
    
    // Display the user management page
    public function manageUser()
    {
        $users = User::paginate(10); // Adjust the number as per your requirement
        return view('admin.user.manageUser', compact('users')); // Pass 'users' to the view
    }
    

    // Display the permissions management page
    public function managePermission()
    {
        return view('admin.user.managePermission');
    }
}