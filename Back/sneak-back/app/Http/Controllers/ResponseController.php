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
        return view('response/index', compact('keywords'), compact('responses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $keywords = Keyword::all();
        $responses = Response::all();
        return view('response/create', compact('keywords'), compact('responses'));
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
    if (isset($request->keywords)) {       
        foreach ($request->keywords as $keyword) {
            $keyword = Keyword::find($keyword);
            $keyword->response()->associate($response->id);
            $keyword->save();
        }
    }

    return redirect()->route('response')->with('success', 'La réponse '. $response->message .' a bien été créée.');
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
    
        return view('response/edit', compact('response', 'keywords', 'selectedKeywords'));
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
            'keywords' => $request->input('keywords'),
            'type' => $request->input('type'),
        ]);
        if (isset($request->keywords)) {       
            foreach ($request->keywords as $keyword) {
                $keyword = Keyword::find($keyword);
                $keyword->response()->associate($response->id);
                $keyword->save();
            }
            // Dissociate the keywords that are not in the request
            $response->keywords()->whereNotIn('id', $request->keywords)->get()->each(function ($keyword) {
                $keyword->response()->dissociate();
                $keyword->save();
            });
        }
        else {
            // Dissociate all keywords if none are checked
            $response->keywords()->get()->each(function ($keyword) {
                $keyword->response()->dissociate();
                $keyword->save();
            });
        }
        return redirect()->route('response')->with('success', 'La réponse '. $response->message .' a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Response $response)
    {
        $response = Response::findOrFail($response->id);
        foreach ($response->keywords as $keyword) {
            $keyword->response()->dissociate();
            $keyword->save();
        }
        $response->delete();

    return redirect()->route('response')
    ->with('success', 'La réponse '. $response->message .' a bien été supprimée.');
    }
}