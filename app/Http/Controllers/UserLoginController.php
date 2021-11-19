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
            'email'=>'required|email:rfc,dns',
            'password'=>'required'
        ]);
        $email= $request->post('email');
        $password= $request->post('password');

        $result=UserRegister::select('*')
                       ->where('email','=',$email)
                       ->first();
        if($result){
            if(Hash::check($password,$result->password)){
                $request->session()->put("Admin_login",true);
                $request->session()->put("Admin_id",$result->id);
                $request->session()->put("Admin_email",$result->email);
                $request->session()->put("Admin_phone",$result->phone);
                $request->session()->put("Admin_name",$result->name);            
                $request->session()->put("Admin_address",$result->address);            
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
        session()->forget('Admin_login');
        session()->forget('Admin_id');
        session()->forget('Admin_name');
        session()->forget('Admin_email');
        session()->forget('Admin_phone');
        session()->forget('Admin_address');
        return redirect()->route('Home.index');
    }


    public function profile(){
        return view('main_site.profile');
    }
}
