<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::with('user', 'orderItems', 'Product')->paginate(10);
        return view ('orders.index', compact('orders'));
    }

    public function downloadReceipt($id)
    {
        $order = Order::with(['user', 'orderItems.product'])->findOrFail($id);

        $pdf = Pdf::loadView('receipt', compact('order'))->setPaper('a4', 'portrait');

        return $pdf->download('receipt-' . $order->id . '.pdf');
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
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    public function updateStatus(Request $request)
{
    $request->validate([
        'order_id' => 'required|exists:orders,id',
        'status' => 'required|in:success,pending,cancel',
    ]);

    $order = Order::findOrFail($request->order_id);
    $order->status = $request->status;
    $order->save();

    return redirect()->back()->with('success', 'Order status updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
