<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use App\Models\PlaceOrder;
use App\Models\UserRegister;
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
                session()->forget('user_district');
                session()->forget('user_address');

                $request->session()->put("delivery_login", true);
                $request->session()->put("delivery_id", $result->id);
                $request->session()->put("delivery_email", $result->email);
                $request->session()->put("delivery_phone", $result->phone);
                $request->session()->put("delivery_name", $result->name);

                return redirect()->route('deliveryman.home');
            } else {
                return redirect()->back()->with('message', 'Password Incorrect');
            }
        } else {
            return redirect()->back()->with('message', 'Email not matched.');
        }
    }

    public function home()
    {
        $deliverymanid=session('delivery_id');
        $result['rdata']= PlaceOrder::where('deliverymanid','=', $deliverymanid)->get();
        $result['ddata']= PlaceOrder::where('seconddeliverymanid','=', $deliverymanid)->get();
        $result['customer']=UserRegister::all();
       // return $result['customer'];
        return view('main_site.deliveryMan.d_home',$result);
    }


    public function recived_by_d($id){

        $model = PlaceOrder::find($id);
        $model->status = 2;
        $model->update();

        return redirect()->back()->with('message','You received the order.');

    }


    public function otpView($id){
        $result['data']=PlaceOrder::find($id);

        return view('main_site.deliveryMan.otp',$result);
    }

    public function otpViewProcess(Request $request){
        $request->validate([
            'otp' => 'required',
            'id' => 'required',
        ]);
        $id=$request->post('id');
        $otp=$request->post('otp');
        $result=PlaceOrder::find($id);
        if($result->otp == $otp){
            $result->status=10;
            $result->update();

            return redirect()->route('deliveryman.home')->with('message', 'OTP Submitted Success..');
        }else{
            return redirect()->back()->with('message','OTP is Not Correct.');
        }



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

    public function history(){
        $result['customer']=UserRegister::all();
        $id=session('delivery_id');
        $result['data']=PlaceOrder::where(['deliverymanid'=>$id])
        ->orWhere(['seconddeliverymanid'=>$id])
        ->get();
        return view('main_site.deliveryMan.d_history',$result);
    }
}
