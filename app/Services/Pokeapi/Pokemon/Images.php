<?php

namespace App\Services\Pokeapi\Pokemon;

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
     * Returns the default image.
     * 
     * @return string|null
     */
    public function defaultImage() : ?string
    {
        return $this->images['front_default'];
    }
    /**
     * Returns a shiny image.
     * 
     * @return string|null
     */
    public function getShinyImage() : ?string
    {
        if(!$this->images['other']['home']['front_shiny']) {
            return $this->defaultImage();
        }
        
        return $this->images['other']['home']['front_shiny'];
    }

    /**
     * Returns a 2d image.
     * 
     * @return string|null
     */
    public function get2dImage() : ?string
    {
        return $this->images['other']['dream_world']['front_default'];
    }
}