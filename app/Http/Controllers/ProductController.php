<?php

namespace App\Http\Controllers;


use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ProductController;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(16);
        return view ('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view ('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
            // 'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // $foto = $request->file('foto');
        // $foto->storeAs('public');

        // Simpan data produk setelah validasi berhasil
        Product::create([
            'name' => $validatedData['name'],
            'price' => $validatedData['price'],
            'description' => $validatedData['description'],
        //    'foto' => $foto,
        ]);

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('products.index')->with('success', 'Added Product Success');
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
    public function edit(Product $product)
    {
            return view ('products.edit', compact('product') );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric|min:0',
            'description' => 'required',
        ]);

            $product->name = $request->name;
            $product->price = $request->price;
            $product->description = $request->description;

            if($request->file('foto')){
                Storage::disk('local')->delete('public/', $product->foto);
                $foto= $request->file('foto');
                $foto->storeAs('public', $foto->hashName());
                $product->foto = $foto->hashName();

            }

            $product->update();
            return redirect()->route('products.index')->with('success', 'Update Product Success');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        if($product->foto !== 'noimage.png'){
            Storage::disk('local')->delete('public/', $product->foto);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Delete Product Success');

    }
}
