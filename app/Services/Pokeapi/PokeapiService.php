<?php

namespace App\Services\Pokeapi;
use App\Services\RequestService;
use Illuminate\Support\Collection;
use App\Services\Pokeapi\Pokemon\Pokemon;
use Illuminate\Support\Facades\Cache;

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
     * @param bool $should_transform_results
     * 
     * @return array|collection
     */
    public function listPokemons(array $params = [], bool $should_transform_results = false) : array|collection
    {
        if(isset($params['search'])) {
            $searchResult = new Pokemon(Cache::get('pokemon'. $params['search']));
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
     * @return Pokemon|Collection
     */
    public function getPokemon(int|string $id, bool $return_results_without_instance = false) : Pokemon|Collection
    {
        $pokemon = Cache::remember('pokemon'. $id, 60 * 24 * 60 * 60, function () use ($id) {
            $getPokemonData = $this->get('/pokemon/'. $id);

            // Also add a cache by name
            Cache::add('pokemon'. $getPokemonData['name'], $getPokemonData, 60 * 24 * 60 * 60);

            return $getPokemonData;
        });

        if($return_results_without_instance) {
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