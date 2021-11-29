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
        $result['data'] = PlaceOrder::where('status','=',0)->get();
        $result['customer']= UserRegister::all();
        //return $result;
        return view('admin.orderview.vieworder',$result);
    }

    public function adddeliveryman($id)
    {
        
        $result['data'] = PlaceOrder::where('id','=',$id)->get();
        $customerid= $result['data'][0]->customerid;
        $result['customer']=UserRegister::where('id','=',$customerid)->get();
        $result['deliveryman']= DeliveryMan::all();
       
        return view('admin.orderview.vieworder_dm_add',$result);
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

    /*
    public function edit($id)
    {
        $result['data'] = ServiceProduct::where('id', '=', $id)->get();


        return view('admin.serviceproduct.serviceProductEdit', $result);
    }

    public function editprocess(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => 'required|max:40',
            'price' => 'required|numeric',
            'status' => 'required|boolean|max:5',
        ]);
        $id = $request->post('id');
        $name = $request->post('name');
        $price = $request->post('price');
        $status = $request->post('status');

        $model = ServiceProduct::find($id);
        $model->name = $name;
        $model->price = $price;
        $model->status = $status;
        $model->update();
        return redirect()->route('admin.serviceproduct')->with('message', 'Service Product Updated..');
    }
    */
}
