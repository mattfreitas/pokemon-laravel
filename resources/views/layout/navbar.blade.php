<nav class="bg-blue-700 w-full pb-24 relative flex flex-col justify-center px-10 md:px-0 items-center">
    <div class="w-full mb-14 border-b border-blue-600">
        <div class="container mx-auto flex md:flex-row flex-col items-center justify-between py-6">
            <span class="font-bold text-white md:mb-0 mb-3">PokeLaravel</span>

            <ul class="w-full md:w-auto rounded md:rounded-none flex flex-col md:flex-row space-y-3 md:space-y-0 md:space-x-7 text-center md:text-left font-semibold py-4 md:py-0 border border-blue-600 md:border-0">
                <li><a href="#" class="text-white hover:text-blue-100">List</a></li>
                <li><a href="#" class="text-white hover:text-blue-100">API & Documentation</a></li>
                <li><a href="#" class="text-white hover:text-blue-100">Contact</a></li>
            </ul>

            <div class="w-full md:w-auto md:pt-0 pt-3">
                <a href="#" class="w-full md:w-auto justify-center flex space-x-1 items-center border border-blue-600 hover:border-blue-400 transition duration-400 px-5 py-1 rounded text-white font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                    <span>My Pokedex (0)</span>
                </a>
            </div>
        </div>
    </div>
    <div class="flex flex-col">
        <div class="text-2xl md:text-5xl font-bold text-white text-center">Your Pokedex in <span class="text-blue-100 italic">Laravel</span>.</div>
        <div class="text-blue-300 text-center">Written using only Laravel and TailwindCSS. No javascript, no custom css. <a href="#" class="text-white font-bold">API is available.</a></div>
    </div>
    <div class="w-full max-w-3xl absolute -bottom-8 h-16">
        <input type="text" class="focus:bg-gray-50 transition duration-200 w-full bg-white h-16 outline-none px-6 shadow md:rounded-xl" placeholder="Search a pokemon by name or id...">
        <button class="transition duration-400 bg-blue-700 md:rounded-xl p-4 absolute right-1 top-1 text-white hover:bg-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
            </svg>
        </button>
    </div>
</nav>