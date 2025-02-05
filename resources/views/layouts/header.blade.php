<header class="z-10 py-4 bg-white shadow-md">
    <div
        class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600"
    >
        <!-- Mobile hamburger -->
        <button
            class="p-1 mr-5 -ml-1 rounded-md md:hidden focus:outline-none focus:shadow-outline-purple"
            @click="toggleSideMenu"
            aria-label="Menu"
        >
            <svg
                class="w-6 h-6"
                aria-hidden="true"
                fill="currentColor"
                viewBox="0 0 20 20"
            >
                <path
                    fill-rule="evenodd"
                    d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                    clip-rule="evenodd"
                ></path>
            </svg>
        </button>
        <!-- Search input -->
        <div class="flex justify-center flex-1 lg:mr-32">
{{--            <div--}}
{{--                class="relative w-full max-w-xl mr-6 focus-within:text-purple-500"--}}
{{--            >--}}
{{--                <div class="absolute inset-y-0 flex items-center pl-2">--}}
{{--                    <svg--}}
{{--                        class="w-4 h-4"--}}
{{--                        aria-hidden="true"--}}
{{--                        fill="currentColor"--}}
{{--                        viewBox="0 0 20 20"--}}
{{--                    >--}}
{{--                        <path--}}
{{--                            fill-rule="evenodd"--}}
{{--                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"--}}
{{--                            clip-rule="evenodd"--}}
{{--                        ></path>--}}
{{--                    </svg>--}}
{{--                </div>--}}
{{--                <input--}}
{{--                    class="w-full pl-8 pr-2 text-sm text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md focus:placeholder-gray-500 focus:bg-white focus:border-purple-300 focus:outline-none focus:shadow-outline-purple form-input"--}}
{{--                    type="text"--}}
{{--                    placeholder="Search for projects"--}}
{{--                    aria-label="Search"--}}
{{--                />--}}
{{--            </div>--}}
        </div>
        <ul class="flex items-center flex-shrink-0 space-x-6">
            <!-- Profile menu -->
            <li class="relative">
                <div class="flex space-x-4">
                    <div class="w-full text-gray-600">
                        <div class="text-right">
                            <form action="{{route('language')}}" method="POST">
                                @csrf
                                @method('post')
                                <label>
                                    <select class="border-0 bg-transparent" name="locale" id="language" onchange="this.form.submit()">
                                        <option class="text-gray-800" value="kz" {{app()->getLocale()=='kz'?'selected':''}}>KAZ</option>
                                        <option class="text-gray-800" value="ru" {{app()->getLocale()=='ru'?'selected':''}}>RUS</option>
                                    </select>
                                </label>
                            </form>
                        </div>
                    </div>
                    <button
                        class="flex items-center align-middle rounded-full focus:shadow-outline-purple focus:outline-none"
                        @click="toggleProfileMenu"
                        @keydown.escape="closeProfileMenu"
                        aria-label="Account"
                        aria-haspopup="true"
                    >
                    <span class="text-gray-500 mr-2">
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </span>
                        <img
                            class="object-cover w-8 h-8 rounded-full"
                            src="/img/user.png"
                            alt=""
                            aria-hidden="true"
                        />
                    </button>
                </div>

                <template x-if="isProfileMenuOpen">
                    <ul
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        @click.away="closeProfileMenu"
                        @keydown.escape="closeProfileMenu"
                        class="absolute right-0 w-56 p-2 mt-2 space-y-2 text-gray-600 bg-white border border-gray-100 rounded-md shadow-md"
                        aria-label="submenu"
                    >
                        <li class="flex items-center">

                                <svg
                                    class="w-4 h-4 mr-3"
                                    aria-hidden="true"
                                    fill="none"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                                    ></path>
                                </svg>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    Log Out
                                </x-dropdown-link>
                            </form>

                        </li>
                    </ul>
                </template>
            </li>
        </ul>
    </div>
</header>
