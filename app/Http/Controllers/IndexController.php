<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class IndexController extends Controller
{
    public function index(){
        return view('pages.home');
    }
    public function login_reg()
    {
        return view('pages.login'); 
    }
    
}
