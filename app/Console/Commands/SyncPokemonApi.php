<?php

namespace App\Console\Commands;

use App\Services\Pokeapi\PokeapiService;
use App\Services\Pokeapi\Pokemon\Pokemon;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class SyncPokemonApi extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:pokeapi';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync all the pokemons and cache it for a very long time.';

    /**
     * Time in days to keep the cache.
     * 
     * @var int
     */
    private $cache_time = 30;

    /**
     * Initialize the command.
     */
    public function __construct(private PokeapiService $pokeapiService)
    {
        parent::__construct();
    }
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Storing in cache for '. $this->cache_time .' days...');

        $daysToSeconds = $this->cache_time * 24 * 60 * 60;

        $list = Cache::remember('pokemonList', $daysToSeconds, function () {
            $pokemonsList = $this->pokeapiService->get('/pokemon', params: [ 'limit' => 1200 ]);
            return $pokemonsList;
        });

        $cacheSpecificPokemonsAndInstance = $this->transformResults(collect($list['results']));

        $this->info('Successfully cached. Now you can get a list of all pokemons faster.');
        return 0;
    }

    /**
     * Transform the results into a Pokemon object.
     * 
     * @param collection $results
     * @return array|collection
     */
    public function transformResults(collection $results) : array|collection
    {
        $results = $results->map(function($result) {
            $this->info('Caching pokemon '. $result['name'] .'.');

            return new Pokemon(
                collect($this->pokeapiService->getPokemon(
                    id: $result['id'],
                    name: $result['name'],
                    return_results_without_instance: true
                ))
            );
        });

        return $results;
    }
}
