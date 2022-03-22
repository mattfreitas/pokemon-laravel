<?php

namespace App\Services\Pokeapi;
use App\Services\RequestService;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use App\Services\Pokeapi\Pokemon\Pokemon;

class PokeapiService extends RequestService
{
    /** @var $endpoint */
    protected $endpoint = 'https://pokeapi.co/api/v2/';

    /** @var $return_type */
    protected $return_type = 'collection';

    /** 
     * Keeps the information about a specific pokemon so we can use that instead of making a new request.
     * 
     * @var $pokemon 
     **/
    protected Pokemon $pokemon;

    /**
     * List all pokemons with params.
     * 
     * @param array $params
     * 
     * @return array|collection0
     */
    public function listPokemons(array $params = []) : array|collection
    {
        abort_if(!Cache::get('pokemonList'), 501, 'Pokemons are not cached. Please, sync the application.');

        if(request()->filled('search') && Cache::get('pokemon'. strtolower(request('search')))) {
            $searchResult = new Pokemon(Cache::get('pokemon'. strtolower(request('search'))));
            return [ $searchResult ];
        }

        $pokemonList = $this->get('pokemon', params: $params);
        $list = $this->fillPokemonListWithDetails($pokemonList->toArray());
        
        return $list;
    }

    /**
     * Fills the pokemon list with details from cache layer.
     * 
     * @param array $list
     * @return array
     */
    private function fillPokemonListWithDetails(array $list) : array
    {
        $pokemonList = [];

        foreach ($list['results'] as $pokemon) {
            $pokemonList[] = $this->getPokemon($pokemon['name']);
        }

        return $pokemonList;
    }

    /**
     * Get a pokemon by id, it can be a string or a id (integer).
     * 
     * @param int|string $id
     * @param bool $instance
     * @return Pokemon|Collection
     */
    public function getPokemon(int|string $id, bool $instance = false) : Pokemon|Collection
    {
        $pokemon = Cache::remember('pokemon'. $id, 60 * 24 * 60 * 60, function () use ($id) {
            $getPokemonData = $this->get('/pokemon/'. $id);
            Cache::add('pokemon'. $getPokemonData['name'], $getPokemonData, 60 * 24 * 60 * 60);
            return $getPokemonData;
        });

        if($instance) {
            return $pokemon;
        }
        
        return $this->setPokemon($pokemon);
    }

    /**
     * Set a pokemon to the current instance.
     * 
     * @param array|collection $pokemon_data
     * @return Pokemon
     */
    public function setPokemon(array|collection $pokemon) : Pokemon
    {
        return new Pokemon($pokemon);
    }
}