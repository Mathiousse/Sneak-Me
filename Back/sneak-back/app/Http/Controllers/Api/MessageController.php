<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Keyword;
use App\Models\Product;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use stdClass;

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
        $type = $request->input('type');
        $q = $request->input('message');

        if ($type === "produit") {

            $pattern = "/'(.*?)'/"; // a pattern that matches anything between single quotes
            if (preg_match($pattern, $q, $matches)) { // if there is a match
                $result = $matches[1];
            }

            $response = Product::where(function($query) use ($result) {
                $query->orWhere('name', 'like', "%$result%");
            })->first();

            $response = [ "response" => $response, "message" => "Voici le produit " . $response->name . " :" , "type" => "produit" ];
            // $response = Product::where('name', '=', $result);
            return response()->json($response);
        };

        if ($type === "acheter") {

            $pattern = "/'(.*?)'/"; // a pattern that matches anything between single quotes
            if (preg_match($pattern, $q, $matches)) { // if there is a match
                $result = $matches[1];
            }

            $response = Product::where(function($query) use ($result) {
                $query->orWhere('name', 'like', "%$result%");
            })->first();

            $response = ["response" => ["message" => "Vous avez bien acheté la paire de " . $response->name . "|||Merci d'avoir fait confiance à Sneak Me, et à bientôt !" ],"type" => "message" ];
            // $response = Product::where('name', '=', $result);
            return response()->json($response);
        };

        $keywords = explode(' ', $q);
        $keywordsResults = [];
        $categoriesResults = [];
        foreach($keywords as $keyword) {
            $response = Category::where(function($query) use ($keyword) {
                $query->orWhere('name', 'like', "%$keyword%");
            })->first();
            array_push($categoriesResults, $response);
        }
        $categoriesResults = array_filter($categoriesResults); 
        if (count($categoriesResults) > 0) {
            $response = Category::Find(end($categoriesResults)->id)->products;
            $response = [ "response"=> $response, "type" => "catalogue", "message" => "Voici tous nos produits de la catégorie '". end($categoriesResults)->name . "'" ];
            return response()->json($response);    
        }
        
        foreach($keywords as $keyword) {
            $response = Keyword::where(function($query) use ($keyword) {
                $query->orWhere('keyword', 'like', "%$keyword%");
            })->first();
            array_push($keywordsResults, $response);
        }
        if ($keywordsResults) {
            // Only run this if there are more than two keywords in the message, then filter which one has the most weight, then run normal response function
            if (count($keywordsResults) > 1) {
                $bestResult = array_reduce($keywordsResults, function ($carry, $item) {
                    if (is_null($item)) return $carry; // skip null items
                    if (is_null($carry)) return $item; // return the first non-null item
                    return $item['weight'] > $carry['weight'] ? $item : $carry; // compare weights and return the higher one
                  });                  
            } else {
                $bestResult = $keywordsResults[0];
            }
            // Get the response associated and do things depending on the type
            if ($bestResult !== null) {
                $response = Response::findOrFail($bestResult['response_id']);
            } else {
                $response = ["response" => ["id" => 1, "message" => "Désolé, je n'ai pas bien compris ce que vous vouliez dire, veuillez réessayer.---Oups, je n'ai pas compris ce que vous avez envoyé, veuillez réessayer." ],"type" => "message" ] ;
                return response()->json($response);
            }
            switch ($response['type']) {

                case 'message':
                    $responseFinal = new stdClass();
                    $responseFinal->response = $response;
                    $responseFinal->type = 'message';
                    return response()->json($responseFinal);

                case 'catalogue':
                    $response = Product::all();
                    $responseFinal = new stdClass();
                    $responseFinal->response = $response;
                    $responseFinal->type = 'catalogue';
                    $responseFinal->message = 'Voici notre catalogue de produits :';
                    return response()->json($responseFinal);
                
                default:    
                    break;
            }
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