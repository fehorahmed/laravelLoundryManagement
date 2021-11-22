<?php

namespace App\Http\Controllers\admin;


use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.adminlogin');
    }

    public function auth(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4|max:10'
        ]);
        $email = $request->post('email');
        $password = $request->post('password');

        $result = Admin::where('email', '=', $email)->first();


        if ($result) {

            if (Hash::check($password, $result->password)) {

                $request->session()->put('name', $result->name);
                $request->session()->put('email', $result->email);

                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('adminlogin.index')->with('message','Password Incorrect.');
            }
        } else {
            return redirect()->route('adminlogin.index')->with('message','Email Incorrect.');
        }
    }



    public function home(){
        
        return view('admin.index');
    }
}
