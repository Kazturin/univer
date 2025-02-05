@props(['links'=>[]])

<nav class="flex bg-gray-50 text-gray-700 border border-gray-200 py-3 px-5 rounded-lg dark:bg-gray-800 dark:border-gray-700 my-4" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-3 flex-wrap md:flex-nowrap">
        <li>
            <div class="flex items-center">
                <a href="/" class="block text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                </a>
            </div>
        </li>
        @foreach($links as $link)
            @if(isset($link['url']))
                <li>
                    <div class="flex items-center">
                        <div>
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <a href="{{ $link['url'] }}" class="block text-gray-700 hover:text-gray-900 ml-1 md:ml-2 text-sm font-medium dark:text-gray-400 dark:hover:text-white">
                            {{ $link['label'] }}
                        </a>
                    </div>
                </li>
            @else
                <li aria-current="page">
                    <div class="flex items-center">
                        <div>
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                        </div>
                        <span class="text-gray-400 ml-1 md:ml-2 text-sm font-medium dark:text-gray-500">{{ $link['label'] }}</span>
                    </div>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
