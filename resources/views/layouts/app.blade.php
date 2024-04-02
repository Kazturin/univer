<!DOCTYPE html>
<html  x-data="data()" lang="kk">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Админка</title>
    {{--    <link--}}
    {{--        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"--}}
    {{--        rel="stylesheet"--}}
    {{--    />--}}
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    {{--    <script--}}
    {{--        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"--}}
    {{--        defer--}}
    {{--    ></script>--}}

    @vite('resources/css/app.css')
    @yield("style")
    @livewireStyles
</head>
<body>
<div
    class="flex h-screen bg-gray-50 dark:bg-gray-900"
    :class="{ 'overflow-hidden': isSideMenuOpen }"
>
    <!-- Desktop sidebar -->
    <aside
        class="z-auto hidden w-64 overflow-y-auto bg-white border-r dark:bg-gray-800 md:block flex-shrink-0"
    >
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                Админка
            </a>

            @include('layouts.nav',['currentUrl' => request()->route()->getName()])

        </div>
    </aside>
    <!-- Mobile sidebar -->
    <!-- Backdrop -->
    <div
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
    ></div>
    <aside
        class="fixed inset-y-0 z-20 flex-shrink-0 w-64 mt-16 overflow-y-auto bg-white dark:bg-gray-800 md:hidden"
        x-show="isSideMenuOpen"
        x-transition:enter="transition ease-in-out duration-150"
        x-transition:enter-start="opacity-0 transform -translate-x-20"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in-out duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0 transform -translate-x-20"
        @click.away="closeSideMenu"
        @keydown.escape="closeSideMenu"
    >
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a
                class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200"
                href="#"
            >
                Windmill
            </a>
            @include('layouts.nav',['currentUrl' => request()->route()->getName()])
            <div class="px-6 my-6">
                <button
                    class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                >
                    Create account
                    <span class="ml-2" aria-hidden="true">+</span>
                </button>
            </div>
        </div>
    </aside>
    <div class="flex flex-col flex-1 w-full">
        @include('layouts.header')
        <main class="h-full pb-16 overflow-y-auto">
            <div class="container grid px-6 mx-auto">
                @yield('wrapper')
            </div>
        </main>
    </div>
</div>
@livewireScripts
@livewire('wire-elements-modal')
@vite('resources/js/app.js')
<script src="/js/init-alpine.js"></script>
@stack('scripts')
</body>
</html>

