<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRandomWords(Request $request, $number=1)
    {
        $words = Word::with('categorie')->inRandomOrder()->take($number)->get();

        $result = array();

        foreach($words as $word) {
            array_push($result, ["name" => $word->name, "categorie" => $word->categorie->name]);    
        }

        return response()->json($result);
    }

    public function getDailyWord()
    {
        $word = Word::where('is_daily_word', '=', 1)->with("categorie")->first();
        $result = [
            "name" => $word->name,
            "categorie" => $word->categorie->name
        ];

        return response()->json($result);
    }

    public function getWeeklyWord()
    {
        $word = Word::where('is_weekly_word', '=', 1)->with("categorie")->first();
        $result = [
            "name" => $word->name,
            "categorie" => $word->categorie->name
        ];

        return response()->json($result);
    }

    public function getMonthlyWord()
    {
        $word = Word::where('is_monthly_word', '=', 1)->with("categorie")->first();
        $result = [
            "name" => $word->name,
            "categorie" => $word->categorie->name
        ];

        return response()->json($result);
    }

    public function getWordsByLetter(Request $request, $letter, $number = 1)
    {
        $words = Word::where('name', 'like', "$letter%")->with("categorie")->inRandomOrder()->take($number)->get();

        $result = array();

        foreach($words as $word) {
            array_push($result, ["name" => $word->name, "categorie" => $word->categorie->name]);    
        }

        return response()->json($result);
    }

    public function getWordsBySize(Request $request, $size, $number = 1)
    {
        $words = Word::whereRaw('LENGTH(name) <= '.$size)->inRandomOrder()->take($number)->get();
        return response()->json($words);
    }



  
}
