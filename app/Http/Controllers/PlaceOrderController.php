<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMan;
use App\Models\PlaceOrder;
use App\Models\User;
use App\Models\UserRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceOrderController extends Controller
{

    public function index()
    {
        $result['products']=DB::table('service_products')->get();
        UserRegister::get();

        return view('main_site.placeorder.order',$result);
    }
    public function store(Request $request){
        $request->validate([
            'productid'=>'required',
            'quantity'=>'required|numeric|max:100',
            'price'=>'required|numeric',
            'address'=>'required'
        ]);
        $pid=$request->post('productid');
        $arr =explode('+',$pid);
        $productid =$arr[0];
        $productName=$arr[2];


        $quantity=$request->post('quantity');
        $price=$request->post('price');
        $customerid=session('user_id');

        $model= new PlaceOrder();
        $model->productname=$productName;
        $model->productid=$productid;
        $model->quantity=$quantity;
        $model->price=$price;
        $model->customerid=$customerid;
        $model->deliverymanid=0;
        $model->status=0;
        $model->save();

        return redirect()->route('view.order')->with('message','Your Order is processing.');

    }

    public function vieworder(){
        $userid=session('user_id');
        $result['data']=PlaceOrder::where('customerid','=',$userid)->get();


        $result['deliveryman']=DeliveryMan::all();
       // return $result['deliveryman'];
        return view('main_site.placeorder.vieworder',$result);
    }


}
