<?php

namespace App\Services\Pokeapi;

class Images
{
    /**
     * Initialize the types. Please note that since PHP 8.0, the constructor is
     * setting $name as instance variable so it's not needed to put in the top of the class
     * or set in the constructor.
     * 
     * @param string $images
     */
    public function __construct(protected array $images) { }

    /**
     * Returns a shiny image.
     * 
     * @return string
     */
    public function getShinyImage() : string
    {
        return $this->images['other']['home']['front_shiny'];
    }

    /**
     * Returns a 2d image.
     * 
     * @return string
     */
    public function get2dImage() : string
    {
        return $this->images['other']['dream_world']['front_default'];
    }
}