<x-layout.base>
    <div class="bg-blue-700 w-full py-24 relative flex justify-center px-10 md:px-0">
        <div class="text-5xl font-bold text-white max-w-md text-center">Your Pokedex in <span class="text-blue-100 italic">Laravel</span>.</div>
        <div class="px-10 md:mx-0 w-full max-w-4xl absolute -bottom-8 h-16">
            <input type="text" class="w-full bg-white h-16 outline-none px-6 shadow rounded-xl" placeholder="Search a pokemon by name or id...">
            <button class="bg-blue-700 rounded-xl p-4 absolute right-11 top-1 text-white hover:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                </svg>
            </button>
        </div>
    </div>

    <div class="pt-6 m-10 grid grid-cols-1 md:grid-cols-4 gap-y-5 gap-x-8">
        @foreach($pokemons as $pokemon)
        <x-pokemon.simplified-information-box 
            :id="$pokemon->getId()"
            :name="ucfirst($pokemon->getName())"
            :types="$pokemon->getTypes()"
            :image="$pokemon->getShinyImage()"
            />
        @endforeach
    </div>
</x-layout-base>