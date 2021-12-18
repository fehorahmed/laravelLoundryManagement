<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserRegister;

class UserRegisterController extends Controller
{
    public function index(){
        $result['district']=District::all();
        return view('main_site.register',$result);
    }


    public function store(Request $request){



        $request->validate([
            'name'=>'required|min:3',
            'email'=>'required|email|unique:user_registers',
            'phone'=>'required|unique:user_registers',
            'districtid'=>'required',
            'address'=>'required',
            'password'=>'required|min:5',
            'confirm_password'=>'required|min:5|same:password',
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
        $code=$request->post('password');
        $model->name=$request->post('name');
        $model->email=$request->post('email');
        $model->phone=$request->post('phone');
        $model->password=Hash::make($code);
        $model->district_id=$request->post('districtid');
        $model->address=$request->post('address');
        $model->save();

        return redirect()->route('Home.index');

    }
    public function useredit(){
        $userid=session('user_id');
        $result['data']=UserRegister::find($userid);
        $result['district']=District::all();

        return view('main_site.useredit',$result);
    }


    public function usereditprocess(Request $request){
        $request->validate([
            'name'=>'required|min:3',
            'districtid'=>'required',
            'address'=>'required',
        ]);

        $model= UserRegister::find(session('user_id'));
        $model->name=$request->post('name');
        $model->district_id=$request->post('districtid');
        $model->address=$request->post('address');
        $model->update();

        session()->forget('user_id');
        session()->forget('user_login');
        session()->forget('user_name');
        session()->forget('user_email');
        session()->forget('user_phone');
        session()->forget('user_district');
        session()->forget('user_address');

        return redirect()->route('userLogin.index')->with('message','Your Profile Updated. Please Login again.');

    }


}
