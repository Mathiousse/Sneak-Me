<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $keywords = explode(' ', $q);
        $response = Keyword::where(function($query) use ($keywords) {
            foreach($keywords as $keyword) {
                $query->orWhere('keyword', 'like', "%$keyword%");
            }
        })->first();
        if ($response) {
            return response()->json($response->response->message);
        }
        else {
            $response = "Désolé, je n'ai pas bien compris ce que vous vouliez dire, veuillez réessayer.---Oups, je n'ai pas compris ce que vous avez envoyé, veuillez réessayer.";
            return response()->json($response);
        }
        
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function destroy(string $id)
    {
        //
    }
}