<?php

use Illuminate\Support\Facades\Route;
use App\Models\Word;
use App\Models\Categorie;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $wordsCount = Word::all()->count();
    $categoriesCount = Categorie::all()->count();
    $categories = Categorie::all();

    return view('welcome')->with([
        "categories" => $categories,
        "wordsCount" => $wordsCount,
        "categoriesCount" => $categoriesCount,
    ]);
});

Route::get('/confidentials', function () {
    return view('confidentials');
});

// Blog routes
Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');