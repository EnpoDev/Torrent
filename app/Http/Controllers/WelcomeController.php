<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $settings = Setting::pluck('value', 'key');
        $categories = Category::where("show_in_home_screen", true)->get();
        return view('welcome.index', compact('settings', 'categories'));
    }

}
