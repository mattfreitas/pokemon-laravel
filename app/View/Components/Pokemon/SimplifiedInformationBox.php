<?php

namespace App\View\Components\Pokemon;

use App\Services\Pokeapi\Images;
use Illuminate\View\Component;

class SimplifiedInformationBox extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public int $id, 
        public string $name, 
        public string|array $types,
        public Images $image
    ) {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.pokemon.simplified-information-box');
    }
}
