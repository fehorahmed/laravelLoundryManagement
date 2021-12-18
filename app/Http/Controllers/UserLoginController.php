<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\UserRegister;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserLoginController extends Controller
{
    public function index(){
        return view('main_site.login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);
        $email= $request->post('email');
        $password= $request->post('password');

        $result=UserRegister::select('*')
                       ->where('email','=',$email)
                       ->first();

       $district=  District::find($result->district_id);

        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put("user_login",true);
                $request->session()->put("user_id",$result->id);
                $request->session()->put("user_email",$result->email);
                $request->session()->put("user_phone",$result->phone);
                $request->session()->put("user_name",$result->name);
                $request->session()->put("user_district",$district->name);
                $request->session()->put("user_address",$result->address);
                return redirect('/');
            }else{

                return redirect()->back()->with('message','Incorrect password!');
            }
        }else{
            return redirect()->back()->with('message','Email not register yet !');
        }
    }


    public function logout(){
        session()->put("user_login");
        session()->forget('user_id');
        session()->forget('user_login');
        session()->forget('user_name');
        session()->forget('user_email');
        session()->forget('user_phone');
        session()->forget('user_district');
        session()->forget('user_address');
        return redirect()->route('Home.index');
    }


    public function profile(){
        return view('main_site.profile');
    }
}
