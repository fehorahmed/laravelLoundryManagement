<?php

namespace App\Http\Controllers;

use App\Models\PlaceOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaceOrderController extends Controller
{
    
    public function index()
    {
        $result['products']=DB::table('service_products')->get();
        
        return view('main_site.placeorder.order',$result);
    }
    

   
}
