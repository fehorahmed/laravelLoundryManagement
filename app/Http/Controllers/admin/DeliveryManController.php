<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryMan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class DeliveryManController extends Controller
{
    public function index(){
        $result['data']= DeliveryMan::all();
        //return $result;
        return view('admin.deliveryMan');
    }
    public function deliveryManDatatable()
    {
        
        $query = DeliveryMan::query();
        return DataTables::eloquent($query)
        ->addIndexColumn()
        ->addColumn('action', function(DeliveryMan $deliveryMan){

               $btn = '<a href="'.route('admin.managedeliverymanedit',['id'=>$deliveryMan->id]).'" class="edit btn btn-info btn-sm">Edit</a>';

                return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    



    public function add(){
        return view('admin.manageDeliveryMan');
    }

    public function store(Request $request){

        $request->validate([
            'name'=>'required|max:40',
            'email'=>'required|email|unique:delivery_men,email|max:255',
            'password'=>'required|min:4|max:40',
            'confirm_password'=>'required|same:password',
            'phone'=>'required|digits_between:11,15',
            'nidnumber'=>'required|digits_between:10,18',
            'address'=>'required|max:150',
            'status'=>'required|boolean|max:5',
        ]);

        $name=$request->post('name');
        $email=$request->post('email');
        $password=Hash::make($request->post('password'));
        $phone=$request->post('phone');
        $nidnumber=$request->post('nidnumber');
        $address=$request->post('address');
        $status=$request->post('status');
        
        $model=new Deliveryman();
        $model->name=$name;
        $model->email=$email;
        $model->password=$password;
        $model->phone=$phone;
        $model->nidnumber=$nidnumber;
        $model->address=$address;
        $model->status=$status;
        $model->save();

        return redirect()->route('admin.deliveryman')->with('message','Delivery man added..');
        
    }

    public function edit($id){
        $result['data']=DeliveryMan::where('id','=',$id)->get();
        

        return view('admin.deliveryManEdit',$result);
    }

    public function editprocess(Request $request){
        $request->validate([
            'id'=>'required',
            'name'=>'required|max:40',
            'email'=>'required|email|max:255|unique:delivery_men,email,'.$request->post('id'),
            'phone'=>'required|digits_between:11,15',
            'nidnumber'=>'required|digits_between:10,18',
            'address'=>'required|max:150',
            'status'=>'required|boolean|max:5',
        ]);
        $id=$request->post('id');
        $name=$request->post('name');
        $email=$request->post('email');
        $phone=$request->post('phone');
        $nidnumber=$request->post('nidnumber');
        $address=$request->post('address');
        $status=$request->post('status');

        $model= DeliveryMan::find($id);
        $model->name=$name;
        $model->email=$email;
        $model->phone=$phone;
        $model->nidnumber=$nidnumber;
        $model->address=$address;
        $model->status=$status;
        $model->update();
        return redirect()->route('admin.deliveryman')->with('message','Delivery man Updated..');
       
    }


}
