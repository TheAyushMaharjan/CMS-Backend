<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function footerSetting()
    {
        return view('admin.setting.footerSetting');
    }

    // Display the permissions management page
    public function headerSetting()
    {
        return view('admin.setting.headerSetting');
    }
}
