<div class="group rounded-xl justify-between shadow-sm space-y-5  transition duration-500 hover:bg-gray-50 bg-gradient-to-br from-white via-white to-purple-50 p-7 flex flex-col relative">
    <div class="space-y-5">
        <div class="flex justify-between space-x-2 items-center">
            <a href="#" class="flex space-x-1 items-center text-slate-900 hover:text-slate-600 transition duration-400">
                <span class="text-2xl font-bold">{{ $name }}</span>
            </a>
            <span class="text-2xl font-bold text-gray-300"># {{ $id }}</span>
        </div>

        <div class="flex flex-col space-y-1">
            @foreach($types as $type)
                <span class="transition duration-200 bg-gray-50 hover:shadow-inner hover:bg-gray-100 text-{{ $type->getColor() }}-400 cursor-pointer px-4 py-2 rounded-full text-sm font-medium">{{ ucfirst($type->getName()) }}</span>
            @endforeach
        </div>
    </div>

    <div class="flex flex-col space-y-2 group-hover:opacity-100 md:opacity-0 transition duration-500 transform translate-y-1 group-hover:translate-y-0">
        <a href="#" class="font-semibold text-slate-500 hover:text-slate-700 flex items-center space-x-2">
            <img class="w-7 h-7" src="{{ asset('storage/images/pokeball-icon.svg') }}" alt="">
            <span>Catch!</span>
        </a>
    </div>
    <img class="absolute -right-10 md:opacity-80 bottom-0 w-44 group-hover:opacity-100 group-hover:-translate-y-1 transform transition-all duration-500" src="{{ $image->getShinyImage() }}" alt="">
</div>