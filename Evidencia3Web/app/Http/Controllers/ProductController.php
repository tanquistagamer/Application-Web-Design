<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    /**
     * Display a form for creating a new product.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cliente' => 'required|max:100',
            'producto' => 'required|max:100',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'precio' => 'required|numeric',
            'tracking' => 'required|max:50',
        ]);

        $file = $request->file('picture');
        if ($file) {
            $path = Storage::disk('public')->put('Products', $file);
        } else {
            $path = 'https://picsum.photos/200/300'; // Imagen predeterminada si no se sube ninguna
        }

        Product::create([
            'cliente' => $validatedData['cliente'],
            'producto' => $validatedData['producto'],
            'picture' => $path,
            'precio' => $validatedData['precio'],
            'tracking' => $validatedData['tracking'],
            'created_at' => now(),
        ]);

        return redirect('/products')->with('success', 'El producto se ha guardado exitosamente');
    }

    /**
     * Display the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'cliente' => 'required|max:100',
            'producto' => 'required|max:100',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'precio' => 'required|numeric',
            'tracking' => 'required|max:50',
        ]);

        $product = Product::findOrFail($id);

        if ($request->file('picture')) {
            $path = Storage::disk('public')->put('Products', $request->file('picture'));

            $product->update([
                'cliente' => $request->cliente,
                'producto' => $request->producto,
                'picture' => $path,
                'precio' => $request->precio,
                'tracking' => $request->tracking,
                'updated_at' => now(),
            ]);
        } else {
            $product->update($validatedData);
        }

        return redirect('/products')->with('success', 'Los datos del producto se han actualizado exitosamente');
    }

    /**
     * Remove the specified product from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->picture) {
            Storage::disk('public')->delete($product->picture);
        }

        $product->delete();

        return redirect('/products')->with('success', 'El producto se ha eliminado exitosamente');
    }
}
