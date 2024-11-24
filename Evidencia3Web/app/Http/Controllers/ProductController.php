<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View|\Illuminate\Http\Response*
     */
    public function index()
    {
        $products = Product::all(); 

        return view('products.index', compact('products')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create() 
    { 
        return view('products.create'); // Redirige a la vista create para agregar un nuevo producto
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request) 
    { 
        $validatedData = $request->validate([ 
            'cliente' => 'required|max:100', 
            'producto' => 'required|max:100', 
            'precio' => 'required|numeric', 
            'tracking' => 'required|max:50', 
        ]); 

        Product::create($validatedData); // Crea un nuevo producto con los datos validados

        return redirect('/products')->with('success', 'El producto se ha guardado exitosamente'); // Redirige al índice con un mensaje de éxito
    }

     /**
     * Display the specified resource.
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\View
     */
    public function edit($id) 
    { 
        $product = Product::findOrFail($id); // Busca el producto por ID o lanza una excepción si no existe

        return view('products.edit', compact('product')); // Redirige a la vista edit con los datos del producto
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id) 
    {
        // Depuración opcional para ver los datos enviados
        // dd($request->all());

        $validatedData = $request->validate([ 
            'cliente' => 'required|max:100', 
            'producto' => 'required|max:100', 
            'precio' => 'required|numeric', 
            'tracking' => 'required|max:50', 
        ]); 

        Product::whereId($id)->update($validatedData); // Actualiza el producto con los datos validados

        return redirect('/products')->with('success', 'Los datos del producto se han actualizado exitosamente'); // Redirige al índice con un mensaje de éxito
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id) 
    { 
        $product = Product::findOrFail($id); 
        $product->delete();
        return redirect('/products')->with('success', 'El producto ha sido eliminado exitosamente'); // Redirige al índice con un mensaje de éxito
    }

}
