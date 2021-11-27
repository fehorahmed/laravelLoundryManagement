<?php

namespace App\Http\Controllers;
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
        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put("user_login",true);
                $request->session()->put("user_id",$result->id);
                $request->session()->put("user_email",$result->email);
                $request->session()->put("user_phone",$result->phone);
                $request->session()->put("user_name",$result->name);            
                $request->session()->put("user_address",$result->address);            
                return redirect('/');
            }else{
                Session::flash('message','Incorrect password!');
                return redirect()->route('userLogin.index');
            }
        }else{
            Session::flash('message','Email not register yet !');
            return redirect()->route('userLogin.index');
        }         
    }


    public function logout(){
        session()->forget('user_id');
        session()->forget('user_login');
        session()->forget('user_name');
        session()->forget('user_email');
        session()->forget('user_phone');
        session()->forget('user_address');
        return redirect()->route('Home.index');
    }


    public function profile(){
        return view('main_site.profile');
    }
}
