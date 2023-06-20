<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::all();
        return view('orders/index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Orders $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Orders $order)
    {

    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Orders $order)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Orders $order)
    {
    }
}