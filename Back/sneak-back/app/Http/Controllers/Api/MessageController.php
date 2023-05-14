<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // if (Auth::check()) {
        //     dd(Auth::user());
        // } else {
        //     return response()->json(["Vous devez être connecté pour faire ça"]);
        // }

        $q = $request->q;
        $keywords = explode(' ', $q);
        // $response = Keyword::where(function($query) use ($keywords) {
        //     foreach($keywords as $keyword) {
        //         $query->orWhere('keyword', 'like', "%$keyword%");
        //     }
        // })->first();
        $keywordsResults = [];
        foreach($keywords as $keyword) {
            $response = Keyword::where(function($query) use ($keyword) {
                $query->orWhere('keyword', 'like', "%$keyword%");
            })->first();
            array_push($keywordsResults, $response);
        }
        if ($keywordsResults) {
            // Only run this if there are more than two keywords in the message, then filter which one has the most weight, then run normal response protocol
            if (count($keywordsResults) > 1) {
                
            }
            return response()->json($keywordsResults);
        }
        else {
            $response = ["id" => 1, "message" => "Désolé, je n'ai pas bien compris ce que vous vouliez dire, veuillez réessayer.---Oups, je n'ai pas compris ce que vous avez envoyé, veuillez réessayer.", "type" => "message"];
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