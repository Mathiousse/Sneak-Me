<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories/index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $category = Category::create([
        'name' => $request->input('name', 'DEFAULT_VALUE_HERE'),
    ]);

    return redirect()->route('categories', $category)->with('success', 'La catégorie '. $category->name .' a bien été créée.');
}
    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::find($category);
        return view('categories/edit', compact('category', 'categories'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string',
        ]);
    
        $category->update([
            'name' => $validated['name'],
        ]);

        $Products = $category->products()->pluck('products.name')->toArray();
    
        return redirect()->route('categories')->with('success', 'La catégorie '. $category->name .' a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

    return redirect()->route('categories')
    ->with('success', 'La catégorie '. $category->name .' a bien été supprimée.');
    }
}