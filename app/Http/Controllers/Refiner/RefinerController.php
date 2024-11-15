<?php

namespace App\Http\Controllers\Refiner;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class RefinerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('refiner.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function confirmOrder(Request $request){
        try{

            $validator = $request->validate([
                'orderId' => 'required',
            ]);
            $order = Order::find($request->orderId);
            $shippingStatus = $order->shippingStatus;

            $shippingStatus->update([
                'con_ref_cnf_ord' => 'confirmed',
                'ref_con_cnf_ord' => 'pending'
            ]);

            // ## Send notification to conductor that the order is confirmed

            return redirect()->back()->withSuccess('Order Confirmed');
        }
        catch (\Exception $e) {
            return redirect()->route('refiner.index')->withError('An error occurred during confirmation');
        }
    }
}
