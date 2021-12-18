<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DistrictController extends Controller
{
    public function index()
    {
        $result['data'] = District::all();
        //return $result;
        return view('admin.district.district',$result);
    }

    public function add()
    {
        return view('admin.district.manageDistrict');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:districts|max:40',
            'status' => 'required|boolean|max:5',
        ]);

        $name = $request->post('name');

        $status = $request->post('status');

        $model = new District();
        $model->name = $name;
        $model->status = $status;
        $model->save();

        return redirect()->route('admin.district')->with('message', 'District added..');
    }

    public function edit($id)
    {
        $result['data'] = District::where('id', '=', $id)->get();


        return view('admin.district.districtEdit', $result);
    }

    public function editprocess(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'name' => ['required','max:40',
            Rule::unique('districts')->ignore($request->post('id')),

        ],
            'status' => 'required|boolean|max:5',
        ]);
        $id = $request->post('id');
        $name = $request->post('name');
        $status = $request->post('status');

        $model = District::find($id);
        $model->name = $name;
        $model->status = $status;
        $model->update();
        return redirect()->route('admin.district')->with('message', 'District Updated..');
    }
    public function delete($id){
        $model = District::find($id);
        $model->delete();
        return redirect()->route('admin.district')->with('message', 'District Deleted..');
    }
}

