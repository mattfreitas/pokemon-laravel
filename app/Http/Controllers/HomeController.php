<?php

namespace App\Http\Controllers;

use App\Services\Pokeapi\PokeapiService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PokeapiService $pokeapi)
    {
        return view('home', [
            'pokemons' => $pokeapi->listPokemons(
                should_transform_results: true
            )
        ]);
    }
}
