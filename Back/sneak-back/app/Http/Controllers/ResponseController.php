<?php

namespace App\Http\Controllers;

use App\Models\Keyword;
use App\Models\Response;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('response', compact('keywords'), compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('create/response', compact('keywords'), compact('responses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        
        'message' => 'required|string',
        'keywords' => 'array',
        'type' => 'required|string',
        
    ]);

    $response = Response::create($request->all());
    $keywords = [$request->keywords];
    if (isset($request->keywords)) {
        $response->keywords()->attach($keywords);
    }
    // get the keywords from request->keyword, loop on it, find the keyword with the good ID and use attach() to

    return redirect()->route('response');
}

    /**
     * Display the specified resource.
     */
    public function show(Response $response)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Response $response)
    {
        $keywords = Keyword::all();
        $selectedKeywords = $response->keywords->pluck('id')->toArray();
    
        return view('edits/response', compact('response', 'keywords', 'selectedKeywords'));
    }
    


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Response $response)
    {
        $this->validate($request, [
            'message' => 'required|string',
            'keywords' => 'array',
            'type' => 'required|string',
        ]);
    
        $response->update([
            'message' => $request->input('message'),
            'keyword' => $request->input('keyword'),
            'type' => $request->input('type'),
            
        ]);
    
        return redirect()->route('response')->with('success', 'L\'utilisateur a été modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        $response->delete();

    return redirect()->route('response')
        ->with('success', 'Le produit a été supprimé avec succès.');
    }
}