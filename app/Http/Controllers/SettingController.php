<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function header()
    {
        $data = Setting::where('nama', 'header')->first();
        return view('admin.setting.header', compact('data'));
    }
}
