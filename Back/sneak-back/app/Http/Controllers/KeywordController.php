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
        return view('keywords/index', compact('keywords'));
    }

    public function create()
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('keywords/create', compact('responses'), compact('keywords'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'keyword' => 'required|string',
        'weight' => 'required|numeric',
    ]);
    $keyword = Keyword::create($request->all());

    return redirect()->route('keywords', $keyword)->with('success', 'Le mot clé '. $keyword->keyword .' a bien été créé.');
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
        return view('keywords/edit', compact('keyword'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keyword $keyword)
    {
        $request->validate([
            'keyword' => 'required|string',
            'weight' => 'required|numeric',
        ]);

        $keyword->update($request->all());

        return redirect()->route('keywords')->with('success', 'Le mot clé '. $keyword->keyword .' a bien été modifié.');
    }

       /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keyword $keyword)
{
    $keyword->delete();

    return redirect()->route('keywords')
    ->with('success', 'Le mot clé '. $keyword->keyword .' a bien été supprimé.');
}

} 