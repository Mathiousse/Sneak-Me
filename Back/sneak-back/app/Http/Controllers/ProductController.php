<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        return view('products/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products/create', compact('categories'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $path = Storage::disk('public')->putFile('Chaussures', $request->file('imageFile'));
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'categories' => 'array',
            'imageFile' => 'required|file'
        ]);

        $request->merge(['image' => $path]);
        $product = Product::create($request->all());

        if (isset($request->categories)) {
            $product->categories()->attach($request->categories);
        }

        return redirect()->route('products')->with('success', 'Le produit '. $product->name .' a bien été créé.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products/edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'price' => 'required|numeric',
        'stock' => 'required|numeric',
        'categories' => 'array',
        'imageFile' => 'file'
    ]);

    if (isset($request->imageFile)) {
        $path = Storage::disk('public')->putFile('Chaussures', $request->file('imageFile'));
        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $path,
        ]);
    } else {
        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
        ]);
    }

    if (isset($validated['categories'])) {
        $product->categories()->sync($validated['categories']);
    } else {
        $product->categories()->detach();
    }

    return redirect()->route('products')->with('success', 'Le produit '. $product->name .' a bien été modifié.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
{
    $product->orderItems()->update(['product_id' => null]);
    $product->delete();

    return redirect()->route('products')
    ->with('success', 'Le produit '. $product->name .' a bien été supprimé.');
}

}