<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        //retornar en json
        return response()->json([
            'status' => true,
            'data' => $products
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio_compra' => 'required',
            'precio_venta' => 'required',
            'cantidad_existencia' => 'required',
            'unidad' => 'required'
        ]);
        
        $product = Product::create([
            'nombre' => $request->nombre,
            'categoria' => $request->categoria,
            'codigo_barras' => $request->codigo_barras,
            'sku' => $request->sku,
            'descripcion' => $request->descripcion,
            'foto' => $request->foto,
            'precio_compra' => $request->precio_compra,
            'precio_venta' => $request->precio_venta,
            'margen' => $request->margen,
            'ganancia' => $request->ganancia,
            'cantidad_existencia' => $request->cantidad_existencia,
            'cantidad_minima' => $request->cantidad_minima,
            'unidad' => $request->unidad
        
        ]);

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update($request->all());
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }
}
