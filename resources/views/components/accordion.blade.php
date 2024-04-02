<div  x-data="{ active: false }" class="rounded-md overflow-hidden">
    <div class="bg-gradient-to-tr from-indigo-500 to-indigo-700">
        <a href="#" class="p-4 block bg-blue-dark hover:bg-blue-darker no-underline text-white flex justify-between" @click="active = !active">
            <strong> {{ $title }}</strong>
            <span class="down-Arrow" x-show="!active">&#9660;</span>
            <span class="up-Arrow" x-show="active">&#9650;</span>
        </a>
    </div>
    <div class="p-2 bg-white shadow-lg border" x-show.transition.in.duration.800ms="active">
        {{ $slot }}
    </div>
</div>
