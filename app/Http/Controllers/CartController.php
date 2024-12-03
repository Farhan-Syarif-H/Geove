<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CartController;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

    public function addToCart(Product $product)
    {


    $userId = Auth::check() ? Auth::id() : null; // Jika user login, ambil user_id

    // Cek apakah produk sudah ada dalam keranjang
    $cartItem = Cart::where('user_id', $userId)->where('product_id', $product->id)->first();

    if ($cartItem) {
        // Jika produk sudah ada, update quantity
        $cartItem->quantity++;
        $cartItem->save();
    } else {
        // Jika produk belum ada, buat item baru
        Cart::create([
            'user_id' => $userId,
            'product_id' => $product->id,
            'quantity' => 1,
        ]);
    }

    return redirect()->back();
}

public function checkoutSingle($id)
{
    $userId = Auth::id();
    $cartItem = Cart::where('user_id', $userId)->where('id', $id)->first();

    if (!$cartItem) {
        return redirect()->back()->with('error', 'Item tidak ditemukan di keranjang.');
    }

    // Hitung total harga untuk item ini
    $totalPrice = $cartItem->quantity * $cartItem->product->price;

    DB::transaction(function () use ($cartItem, $totalPrice, $userId) {
        // Buat data order untuk item tunggal
        $order = Order::create([
            'user_id' => $userId,
            'status' => 'success',
            'total_price' => $totalPrice,
        ]);

        // Simpan item ke dalam order_items
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ]);

        // Hapus item dari cart
        $cartItem->delete();
    });

    return redirect()->back()->with('success', 'Pesanan berhasil dibuat!');
}

public function checkoutAll()
{
    $userId = Auth::id();
    $cartItems = Cart::where('user_id', $userId)->get();

    // Hitung total harga seluruh item
    $totalPrice = $cartItems->sum(function ($item) {
        return $item->quantity * $item->product->price;
    });

    DB::transaction(function () use ($cartItems, $totalPrice, $userId) {
        // Buat data order untuk semua item
        $order = Order::create([
            'user_id' => $userId,
            'status' => 'success',
            'total_price' => $totalPrice,
        ]);

        // Simpan semua item ke dalam order_items
        foreach ($cartItems as $cartItem) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->price,
            ]);
        }

        // Hapus semua item dari cart
        Cart::where('user_id', $userId)->delete();
    });

    return redirect()->back()->with('success', 'Checkout berhasil!');
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }

    public function removeFromCart($cartItemId)
{
    // Temukan item keranjang berdasarkan ID
    $cartItem = Cart::find($cartItemId);

    // Jika item ditemukan, hapus
    if ($cartItem) {
        $cartItem->delete();
    }

    // Redirect kembali ke halaman sebelumnya
    return redirect()->back();
}



}
