<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactUsController extends Controller
{
    public function index(){
        return view('main_site.contact');
    }
    public function messageStore(Request $request){
        
        $request->validate([
            'name'=>'required|max:40',
            'email'=>'required|max:60',
            'message'=>'required',
        ]);

        
        $name=$request->post('name');
        $email=$request->post('email');
        $message=$request->post('message');

        $model=new Contact();
        $model->name=$name;
        $model->email=$email;
        $model->message=$message;
        $model->save();
        return redirect()->back()->with('message','Thanks for Your Message');
    }

    public function showMessage(){
        $result['data']=Contact::all();
        return view('admin.contact.contactmessage',$result);
    }
}
