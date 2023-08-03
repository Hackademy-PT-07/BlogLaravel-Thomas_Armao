<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AnimeController extends Controller
{
    public function index() {

        $endpoint = 'https://api.jikan.moe/v4/genres/anime';

        $genres = Http::get($endpoint)->json();

        //dd($genres['data']);

        return view('anime.index',['index' => $genres['data']]);
    }

    public function animeByGenre($id){

        $endpoint = 'https://api.jikan.moe/v4/anime?genres=' . $id;

        $anime = Http::get($endpoint)->json();

        return view('anime.genres',['anime' => $anime['data']]);
    }
}
