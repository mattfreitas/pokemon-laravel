<?php

namespace App\Services\Pokeapi;
use App\Services\RequestService;
use App\Services\Pokeapi\Pokemon;

class PokeapiService extends RequestService
{
    /** @var $endpoint */
    protected $endpoint = 'https://pokeapi.co/api/v2/';

    /** @var $return_type */
    protected $return_type = 'array';

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
     * @return array|collection
     */
    public function listPokemons(array $params = []) : array|collection
    {
        $list = $this->get('/pokemon', $params);
        return $list;
    }

    /**
     * Get a pokemon by id, it can be a string or a id (integer).
     * 
     * @param int|string $id
     * @return Pokemon
     */
    public function getPokemon(int|string $id) : Pokemon
    {
        $pokemon = $this->get('/pokemon/' . $id);
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