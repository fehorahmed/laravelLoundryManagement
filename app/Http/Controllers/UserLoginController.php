<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index(){
        return view('main_site.login');
    }
}
