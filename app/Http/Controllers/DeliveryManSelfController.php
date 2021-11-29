<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DeliveryManSelfController extends Controller
{
    public function index()
    {
        return view('main_site.deliveryMan.d_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->post('email');
        $password = $request->post('password');

        $result = DeliveryMan::where('email', '=', $email)->first();
        if ($result) {
            if (Hash::check($password, $result->password)) {
                session()->forget('user_id');
                session()->forget('user_login');
                session()->forget('user_name');
                session()->forget('user_email');
                session()->forget('user_phone');
                session()->forget('user_address');

                $request->session()->put("delivery_login", true);
                $request->session()->put("delivery_id", $result->id);
                $request->session()->put("delivery_email", $result->email);
                $request->session()->put("delivery_phone", $result->phone);
                $request->session()->put("delivery_name", $result->name);

                return redirect()->route('deliveryman.home')->with('message', 'Welcome ' . $result->name);
            } else {
                return redirect()->back()->with('message', 'Password Incorrect');
            }
        } else {
            return redirect()->back()->with('message', 'Email not matched.');
        }
    }

    public function home()
    {
        return view('main_site.deliveryMan.d_home');
    }

    public function logout()
    {
        session()->forget("delivery_login");
        session()->forget("delivery_id");
        session()->forget("delivery_email");
        session()->forget("delivery_phone");
        session()->forget("delivery_name");

        return redirect()->route('Home.index');
    }
}
