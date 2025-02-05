<ul
    x-transition:enter="transition-all ease-in-out duration-300"
    x-transition:enter-start="opacity-25 max-h-0"
    x-transition:enter-end="opacity-100 max-h-xl"
    x-transition:leave="transition-all ease-in-out duration-300"
    x-transition:leave-start="opacity-100 max-h-xl"
    x-transition:leave-end="opacity-0 max-h-0"
    class="p-2 mt-2 space-y-2 overflow-hidden text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50 dark:text-gray-400 dark:bg-gray-900"
    aria-label="submenu"
>
    @foreach($subMenuItems as $subMenuItem)
    <li
        class="px-2 py-1 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
    >
        <a class="w-full" href="{{ route($subMenuItem->url) }}"> {{ $subMenuItem->name_kz }}</a>
        @if($subMenuItem->children->count() > 0)
            @include('menu.menu-item', ['subMenuItems' => $subMenuItem->children])
        @endif
    </li>
    @endforeach
</ul>
