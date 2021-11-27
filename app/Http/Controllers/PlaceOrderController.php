<?php

namespace App\Http\Controllers;

use App\Models\PlaceOrder;
use Illuminate\Http\Request;

class PlaceOrderController extends Controller
{
    
    public function index()
    {
        return view('main_site.placeorder.order');
    }
    

   
}
