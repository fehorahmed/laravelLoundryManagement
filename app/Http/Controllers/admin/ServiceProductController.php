<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceProduct;
use Illuminate\Http\Request;

class ServiceProductController extends Controller
{

    public function index()
    {
        $result['data'] = ServiceProduct::all();
        //return $result;
        return view('admin.serviceproduct.serviceProduct',$result);
    }

    public function add()
    {
        return view('admin.serviceproduct.manageServiceProduct');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:40',
            'price' => 'required|numeric',
            'status' => 'required|boolean|max:5',
        ]);

        $name = $request->post('name');
        $price = $request->post('price');
        $status = $request->post('status');

        $model = new ServiceProduct();
        $model->name = $name;
        $model->price = $price;
        $model->status = $status;
        $model->save();

        return redirect()->route('admin.serviceproduct')->with('message', 'Service Product added..');
    }

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
}
