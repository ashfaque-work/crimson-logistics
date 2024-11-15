<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ShippingStatus;
use App\Models\NotifyStatus;
use App\Models\Address;
use App\Models\Payment;
use App\Models\Billing;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('conductor.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all();
        return view('conductor.orders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = $request->validate([
                'order_total' => 'required|numeric',
                'products' => 'required|array',
                'quantities' => 'required|array',
            ]);

            // Create the order
            $order = Order::create([
                'order_number' => uniqid('OD'),
                'status' => 'pending',
                // 'order_total' => $validator['order_total'],
                'order_total' => 123,
                'conductor_id' => 1,
                'refiner_id' => 1,
                'freight_id' => 1,
                'shipper_id' => 1,
                'client_id' => 1,
            ]);

            // Attach order items
            $products = $validator['products'];
            $quantities = $validator['quantities'];
            foreach ($products as $key => $productId) {
                $product = Product::find($productId);
                $quantity = $quantities[$key];
                $itemTotal = $product->price * $quantity;

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'item_total' => $itemTotal,
                ]);
            }

            // Create records for related models

            // ## Send notification to Refiner and implement confirmation

            $shippingStatus = ShippingStatus::create(['order_id' => $order->id,
                                                'con_ref_cnf_ord' => 'pending',
                                                'ref_con_cnf_ord' => null]);

            $notifyStatus = NotifyStatus::create(['order_id' => $order->id]);
            $address = Address::create(['order_id' => $order->id]);
            $payment = Payment::create(['order_id' => $order->id]);
            $billing = Billing::create(['order_id' => $order->id]);
            $orderDetail= OrderDetail::create(['order_id' => $order->id]);

            return redirect()->route('conductor.orders.index')->withSuccess('Order created successfully!');
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->route('conductor.orders.index')->withError('An error occurred during the order creation.');
        }
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
    public function delete(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = Order::findOrFail($orderId);
        if ($order) {
            $order->delete();
            return redirect()->route('conductor.orders.index')->withSuccess('Order deleted successfully.');
        } else {
            return redirect()->route('conductor.orders.index')->withError('This Order record not found.');
        }
    }

    public function readyToReceive(Request $request){
        $query = ShippingStatus::where('order_id', $request->orderId);
        if( $query ){
            $query->update(['ref_con_cnf_ord' => 'ready_to_receive']);
            return redirect()->back()->withSuccess("Confirmed Ready to Receive");
        }
        return redirect()->back()->withError("Order not found");
    }
    public function viewReadyToReceive(){

        $orders = Order::whereHas('shippingStatus', function ($query) {
                                    $query->where('ref_con_cnf_ord', 'ready_to_receive');
                                })->get();
                                
        return view('conductor.orders.readyToReceive', compact('orders'));

    }
}
