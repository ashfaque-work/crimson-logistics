<?php

namespace App\Http\Controllers\Freight;

use App\Http\Controllers\Controller;
use App\Models\ShippingStatus;
use Illuminate\Http\Request;
use App\Models\Order;

class FreightController extends Controller
{
    public function index()
    {
        $orders = Order::whereHas('shippingStatus', function ($query) {
                        $query->where('ref_con_cnf_ord', 'ready_to_receive');
                    })->get();
        return view('freight.index', compact('orders'));
    }
}
