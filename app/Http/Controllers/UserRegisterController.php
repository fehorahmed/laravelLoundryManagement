<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRegister;

class UserRegisterController extends Controller
{
    public function index(){
        return view('main_site.register');
    }


    public function store(Request $request){


        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:user_registers',
            'phone'=>'required|unique:user_registers',
            'address'=>'required',
            'password'=>'required|min:5',
            'confirm_password'=>'required|min:5',
        ],[
            'name.required'=>'Name field must not be empty',
            'name.min'=>'Name at least 3 character',
            'email.required'=>'Email field must not be empty',
            'email.unique'=>'This email already exists',
            'email.email'=>'invalid email format',
            'phone.unique'=>'This phone number already exists',
            'phone.required'=>'Phone field must not be empty',
            'password.required'=>'Password field must not be empty',
            'confirm_password.required'=>'Confirm Password field must not be empty',
        ]);
       
        $model=new UserRegister;

        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->phone=$request->post('phone');
        $model->password=$request->post('password');
        $model->address=$request->post('address');
        $model->save();
        
    }
}
