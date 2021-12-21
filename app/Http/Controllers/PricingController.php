<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceProduct;

class PricingController extends Controller
{
    public function index(){
        $result['product']=ServiceProduct::where('status',1)->get();
        
        return view('main_site.pricing',$result);
    }
}
