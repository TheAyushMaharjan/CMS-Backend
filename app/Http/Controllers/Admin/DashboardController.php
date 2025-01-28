<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalUsers = User::count();
        $totalContents = 24;
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'totalContents' => $totalContents,
        ]);
    }
}
