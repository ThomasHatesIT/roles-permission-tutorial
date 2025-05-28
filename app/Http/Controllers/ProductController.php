<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ProductController extends Controller
{

    
public function __construct(){
    
      $this->middleware(['permission:products-edit'], ["only" => ["edit", "update"]]); 
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $product = Product::latest()->paginate(10);
       return view('products.index', [
        'products' =>  $product,
       ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
           
        ]);

        Product::create([
            'name' => $validated['name'],
            
        ]);

        return redirect()->route('products.index')->with('status', 'product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

             return view('products.show', [
                'product' => $product,
             ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
      $product = Product::findOrFail($id);

             return view('products.edit', [
                'product' => $product,
             ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
         $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
       
    ]);



  

    $product->update($validated);

    return redirect()->route('products.index')->with('status', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
 $product = Product::findOrFail($id);

        $product->delete();
     return redirect('/products');
    }
}
