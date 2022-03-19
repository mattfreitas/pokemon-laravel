<?php

namespace App\Services\Pokeapi;

use Illuminate\Support\Collection;

class Pokemon
{
    /** @var $pokemon */
    private array|collection $pokemon = [];

    /** @var $id */
    protected ?int $id = null;

    /** @var $name */
    protected ?string $name = null;

    /** @var $types */
    protected array|int $types = [];

    /** @var $stats */
    protected array $stats = [];

    /** @var $images */
    protected array $images = [];

    /**
     * Initialize the pokemon.
     * 
     * @param array|collection $pokemon
     * @return void
     */
    public function __construct(array|collection $pokemon)
    {
        $this->setPokemon($pokemon)
            ->setId()
            ->setName()
            ->setTypes()
            ->setStats()
            ->setImages();
    }

    /**
     * Get all the pokemon data.
     * 
     * @return array|collection
     */
    public function getPokemon() : array|collection
    {
        return $this->pokemon;
    }

    /**
     * Returns the current instance id.
     * 
     * @return int
     */
    public function getId() : int
    {
        return $this->id;
    }

    /**
     * Returns the current instance name.
     * 
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Returns the current instance types.
     * 
     * @return array
     */
    public function getTypes() : array
    {
        return $this->types;
    }

    /**
     * Returns the current instance stats.
     * 
     * @return array
     */
    public function getStats() : array
    {
        return $this->stats;
    }

    /**
     * Returns the current instance images.
     * 
     * @return array
     */
    public function getImages() : array
    {
        return $this->images;
    }

    /**
     * Sets the pokemon.
     * 
     * @param array|collection $pokemon
     * @return Pokemon
     */
    public function setPokemon(array|collection $pokemon) : Pokemon
    {
        $this->pokemon = $pokemon;
        return $this;
    }

    /**
     * Set pokemon id.
     * 
     * @return Pokemon
     */ 
    public function setId() : Pokemon
    {
        $this->id = $this->getPokemon()['id'];
        return $this;
    }

    /**
     * Set pokemon name.
     * 
     * @return Pokemon
     */
    public function setName() : Pokemon
    {
        $this->name = $this->getPokemon()['name'];
        return $this;
    }

    /**
     * Set pokemon type(s).
     * 
     * @return Pokemon
     */
    public function setTypes() : Pokemon
    {
        $generalTypes = $this->getPokemon()['types'];
        $finalTypes = [];

        foreach($generalTypes as $types) {
            $finalTypes[] = ucfirst($types['type']['name']);
        }

        $this->types = $finalTypes;
        return $this;
    }

    /**
     * Set pokemon stats.
     * 
     * @return Pokemon
     */
    public function setStats() : Pokemon
    {
        $generalStats = $this->getPokemon()['stats'];
        $finalStats = [];

        foreach($generalStats as $stats) {
            $finalStats[$stats['stat']['name']] = $stats['base_stat'];
        }

        $this->stats = $finalStats;
        return $this;
    }

    /**
     * Set pokemon images.
     * 
     * @return Pokemon
     */
    public function setImages() : Pokemon
    {
        $generalImages = $this->getPokemon()['sprites'];
        $finalImages = [];

        foreach($generalImages as $key => $image) {
            $finalImages[$key] = $image;
        }

        $this->images = $finalImages;
        return $this;
    }

    /**
     * Get an shiny image.
     * 
     * @return string
     */
    public function getShinyImage() : string
    {
        return $this->getImages()['other']['home']['front_shiny'];
    }
}