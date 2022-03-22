<x-layout.base>
    @include('layout.navbar')

    <div class="m-10 grid grid-cols-1 md:grid-cols-4 gap-y-5 gap-x-8">
        @foreach($pokemons as $pokemon)
        <x-pokemon.simplified-information-box 
            :id="$pokemon->getId()"
            :name="ucfirst($pokemon->getName())"
            :types="$pokemon->getTypes()"
            :image="$pokemon->getImages()"
            />
        @endforeach
    </div>
</x-layout-base>