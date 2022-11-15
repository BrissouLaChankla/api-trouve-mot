<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function getWordsByCategorie(Request $request, $id_categorie, $number = 1)
    {
        $categorie = Categorie::where('id', '=', $id_categorie)->with("words")->first();
        $words = $categorie->words->shuffle()->take($number);

        
        $result = array();

        foreach($words as $word) {
            array_push($result, ["name" => $word->name, "categorie" => $word->categorie->name]);    
        }

        return response()->json($result);
    }
}
