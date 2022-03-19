<div class="group rounded-xl justify-between shadow-sm space-y-5  transition duration-500 hover:bg-gray-50 bg-gradient-to-br from-white via-white to-purple-50 p-7 flex flex-col relative">
    <div class="space-y-5">
        <div class="flex justify-between">
            <span class="text-2xl font-bold">{{ $name }}</span>
            <span class="text-2xl font-bold text-gray-300"># {{ $id }}</span>
        </div>

        <div class="flex flex-col space-y-1">
            @foreach($types as $type)
                <span class="cursor-pointer hover:bg-gray-100 bg-gray-50 px-4 py-2 rounded-full text-sm font-medium">{{ $type }}</span>
            @endforeach
        </div>
    </div>

    <a href="#" class="font-semibold text-slate-600 hover:text-slate-700 flex px-2">
        <span>Details</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5m0 0l-5 5m5-5H6" />
        </svg>
    </a>
    <img class="absolute -right-10 opacity-80 bottom-0 w-44 group-hover:opacity-100 group-hover:-translate-y-1 transform transition-all duration-500" src="{{ $image }}" alt="">
</div>