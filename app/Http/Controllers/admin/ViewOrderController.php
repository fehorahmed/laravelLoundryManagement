<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use App\Models\PlaceOrder;
use App\Models\UserRegister;
use Illuminate\Http\Request;

class ViewOrderController extends Controller
{
    public function index()
    {
        $result['data'] = PlaceOrder::where('status', '=', 0)->get();
        $result['customer'] = UserRegister::all();
        //return $result;
        return view('admin.orderview.vieworder', $result);
    }

    public function adddeliveryman($id)
    {

        $result['data'] = PlaceOrder::where('id', '=', $id)->get();
        $customerid = $result['data'][0]->customerid;
        $result['customer'] = UserRegister::where('id', '=', $customerid)->get();
        $result['deliveryman'] = DeliveryMan::all();

        return view('admin.orderview.vieworder_dm_add', $result);
    }


    public function store(Request $request)
    {

        $request->validate([

            'id' => 'required',
            'deliverymanid' => 'required|max:40',
            'status' => 'required|boolean|max:5',
        ]);

        $id = $request->post('id');
        $deliverymanid = $request->post('deliverymanid');
        $status = $request->post('status');

        $model = PlaceOrder::find($id);
        $model->deliverymanid = $deliverymanid;
        $model->status = $status;
        $model->update();

        return redirect()->route('admin.orderview')->with('message', 'Delivery Man added..');
    }


    public function view_with_dm()
    {
        $result['data'] = PlaceOrder::where('status', '=', 1)->get();
        $result['customer'] = UserRegister::all();
        $result['deliveryman'] = DeliveryMan::all();
        //return $result;
        return view('admin.orderview_with_dm.vieworder_with_dm', $result);
    }

    public function edit_deliveryman($id)
    {

        $result['data'] = PlaceOrder::where('id', '=', $id)->get();
        $customerid = $result['data'][0]->customerid;
        $result['customer'] = UserRegister::where('id', '=', $customerid)->get();
        $result['deliveryman'] = DeliveryMan::all();

        return view('admin\orderview_with_dm\vieworder_dm_edit', $result);
    }

    public function edit_deliveryman_store(Request $request)
    {
        $request->validate([

            'id' => 'required',
            'deliverymanid' => 'required|max:40',
        ]);

        $id = $request->post('id');
        $deliverymanid = $request->post('deliverymanid');


        $model = PlaceOrder::find($id);
        $model->deliverymanid = $deliverymanid;
        $model->update();

        return redirect()->route('admin.orderview_with_dm')->with('message', 'Delivery Man Updated..');
    }


    public function order_recived_from_dm(){
        $result['data'] = PlaceOrder::where('status', '=', 2)
        ->orWhere('status', '=', 3)
        ->orWhere('status', '=', 4)
        ->get();
        $result['customer'] = UserRegister::all();
        $result['deliveryman'] = DeliveryMan::all();
        //return $result;
        return view('admin.orderRecivedAndDelivery.order_recived_from_dm', $result);
    }

    public function recived_product_from_dm($id){

        //Status 3 = shop receive the product.
        $model = PlaceOrder::find($id);
        $model->adminid = session('admin_id');
        $model->status = 3;
        $model->update();

        return redirect()->back()->with('message','Product Recived BY '.session('admin_name'));
    }

    public function assign_second_delivery_man(Request $request){
        $request->validate([
            'seconddeliverymanid'=>'required',
            'id'=>'required'
        ],
        [
            'seconddeliverymanid.required'=>'Delivery Man Should not Empty.'
        ]
    );
    $randomNumber = random_int(10000, 99999);

    $id = $request->post('id');
    $seconddeliverymanid = $request->post('seconddeliverymanid');
    $model = PlaceOrder::find($id);
    $model->seconddeliverymanid= $seconddeliverymanid;
    $model->status = 4;
    $model->otp = $randomNumber;
    $model->update();

    return redirect()->back();
    }


}
