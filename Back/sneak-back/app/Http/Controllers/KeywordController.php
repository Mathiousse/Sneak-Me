<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KeywordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $keywords = Keyword::all();
        return view('keywords', compact('keywords'));
    }

    public function create()
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('create/keywords', compact('responses'), compact('keywords'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $keyword = new Keyword();
    $keyword->keyword = $request->input('keyword');
    $keyword->save();

    return redirect()->route('keywords', $keyword);
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
    public function edit(Keyword $keyword)
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('edits/keywords', compact('keywords', 'responses'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

       /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keyword $keyword)
{
    $keyword->delete();

    return redirect()->route('keywords')
        ->with('success', 'Le mot-clé a été supprimé avec succès.');
}

} 