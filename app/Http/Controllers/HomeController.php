<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Pokeapi\PokeapiService;

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
