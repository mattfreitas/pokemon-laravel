<?php

namespace App\Services\Pokeapi;
use App\Services\RequestService;
use App\Services\Pokeapi\Pokemon;
use Illuminate\Support\Collection;

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
        $list = $this->get('/pokemon', $params);

        if($should_transform_results) {
            $list = $this->transformResults(collect($list['results']));
        }

        return $list;
    }

    /**
     * Transform the results into a Pokemon object.
     * 
     * @param array|collection $results
     */
    public function transformResults(array|collection $results) : array|collection
    {
        $results = $results->map(function($result) {
            return new Pokemon(
                collect($this->getPokemon(
                    id: $result['name'],
                    return_results_without_instance: true
                ))
            );
        });

        return $results;
    }

    /**
     * Get a pokemon by id, it can be a string or a id (integer).
     * 
     * @param int|string $id
     * @return Pokemon
     */
    public function getPokemon(int|string $id, bool $return_results_without_instance = false) : Pokemon|Collection
    {
        $pokemon = $this->get('/pokemon/' . $id);

        if($return_results_without_instance) {
            return $pokemon;
        }
        
        return $this->setPokemon($pokemon);
    }

    /**
     * Set a pokemon to the current instance.
     * 
     * @param array|collection $pokemon_data
     * @return void
     */
    public function setPokemon(array|collection $pokemon) : Pokemon
    {
        return new Pokemon($pokemon);
    }
}