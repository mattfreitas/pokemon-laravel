<?php

namespace App\Services\Pokeapi\Pokemon;

class Types
{
    /** @var $color */
    protected ?string $color = null;

    /** @var $types */
    protected array $types = [];

    /**
     * Initialize the types.
     * 
     * @param string $name
     */
    public function __construct(protected string $name) {
        $this->color = $this->attributeToColor($name);
     }

    /**
     * Get the name of the type.
     * 
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Get the color of the type.
     * 
     * @return string
     */
    public function getColor() : string
    {
        return $this->color;
    }

    /**
     * Returns a color for a given attribute.
     * 
     * @param string $attribute
     * @return string
     */
    public function attributeToColor($attribute)
    {
        return match($attribute) {
            'grass'    => 'green',
            'fire'     => 'red',
            'water'    => 'blue',
            'bug'      => 'yellow',
            'poison'   => 'purple',
            'normal'   => 'gray',
            'flying'   => 'orange',
            'electric' => 'yellow',
            'ground'   => 'brown',
            'fairy'    => 'pink',
            'fighting' => 'red',
            'psychic'  => 'purple',
            'rock'     => 'brown',
            'ghost'    => 'gray',
            'steel'    => 'gray',
            'ice'      => 'blue',
            'dragon'   => 'red',
            'dark'     => 'purple',
            'unknown'  => 'gray',
            'shadow'   => 'gray',
            default    => 'gray',
        };
    }
}