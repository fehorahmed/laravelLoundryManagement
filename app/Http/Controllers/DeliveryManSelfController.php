<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryManSelfController extends Controller
{
    public function index(){
        return view('main_site.deliveryMan.d_login');
    }

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $email=$request->post('email');
        $password=$request->post('password');

        $result=DeliveryMan::where('email' ,'=', $email)->first();
            if($result){
                if(Hash::check($password,$result->password)){
                    return redirect()->route('deliveryman.home');
                }else{
                    return redirect()->with('message','Password Incorrect');
                }
            }else{
                return redirect()->with('message','Email not matched.');
            }


    }

    public function home(){
        return view('main_site.deliveryMan.d_home');
    }
}
