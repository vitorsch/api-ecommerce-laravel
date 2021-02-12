<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cart_id' => 'required',
            'address_id' => 'required',
            'billing_address_id' => 'required',
            'payment_type_id' => 'required',
            'total' => 'required',
        ]);

        $order = Order::create([
            'cart_id' => $request->input('cart_id'),
            'address_id' => $request->input('address_id'),
            'billing_address_id' => $request->input('billing_address_id'),
            'payment_type_id' => $request->input('payment_type_id'),
            'total' => $request->input('total'),
        ]);

        return $order;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        // $table->unsignedInteger('cart_id');
        //     $table->unsignedInteger('address_id');
        //     $table->unsignedInteger('billing_address_id');
        //     $table->unsignedInteger('payment_type_id');
        //     $table->decimal('total', 10, 2);
        $orderUpdate = Order::find($order->id);
        if (!$orderUpdate) {
            return response()->json([
                'success' => false,
                'message' => 'Produto com id ' . $order->id . ' não encontrado'
            ]);
        };
        $update = $order->fill([
            'cart_id' => $request->input('cart_id') ? 
                $request->input('cart_id') : $order->cart_id,
            'address_id' => $request->input('address_id') ? 
                $request->input('address_id') : $order->address_id,
            'billing_address_id' => $request->input('billing_address_id') ?
                $request->input('billing_address_id') : $order->billing_address_id,
            'payment_type_id' => $request->input('payment_type_id') ?
                $request->input('payment_type_id') : $order->payment_type_id,
            'total' => $request->input('total') ?
                $request->input('total') : $order->total,
        ])->save();

        return $update;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
